<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Services\CountryService;
use App\Services\LocaleService;
use Illuminate\Validation\Rule;
use Symfony\Component\Intl\Countries;
class CountryController extends Controller
{
    protected $countryService;
    protected $localeService;

    public function __construct(CountryService $countryService,LocaleService $localeService)
    {
        $this->countryService = $countryService;
        $this->localeService = $localeService;
    }

    public function index()
    {
        $countries = $this->countryService->getAllCountries();
        $countries_intl = $this->localeService->getAllIntlCountries();
        // dd($countries_intl);
        return view('admin.countries.index', compact('countries','countries_intl'));
    }

    public function create()
    {
        $title = "Create Country";

        return view('admin.countries.create', compact('title'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        // dd("store");
        // dd($request->all());
        $rules = [
            'country_code' => 'required|string|max:10|unique:countries,code',

            'country_name' => 'required|string|max:255|unique:countries,name',
        ];

        $customMessages = [
            'country_code.required' => 'Country Code is required',
            'country_code.unique' => 'Country Code already exists',
            'country_name.required' => 'Country Name is required',
            'country_name.unique' => 'Country Name already exists',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        // Check validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => 'false',
                'type' => 'error',
                'errors' => $validator->messages(),
            ]);
        }

        $data = $request->all();
        $data=['code'=> $data['country_code'],'name'=> $data['country_name'],'timezone'=>$data['timezone']];
        // dd($data);
        if ($this->countryService->createCountry($data)) {
            return response()->json([
                'status' => 'success',
                'type' => 'success',
                'message' => '/admin/countries',
            ]);
        }
    }

    public function edit($id)
    {
        // $title = "Edit Country";
        // $country = $this->countryService->getCountryById($id);
        // return view('admin.countries.edit', compact('title', 'country'));
        $country = $this->countryService->getCountryById($id);
        if ($country) {
            return response()->json(['status' => 'success', 'data' => $country]);
        }
        return response()->json(['status' => 'error', 'message' => 'Country not found']);
    }

    public function update(Request $request)
    {
        // dd($request->all());
        // Validate the incoming request
        $rules = [
            'country_code' => [
                'required',
                'string',
                'max:10',
                Rule::unique('countries', 'code')->ignore($request->id),
            ],
            'country_name' => ['required',
            'string','max:255',
            Rule::unique('countries', 'name')->ignore($request->id),
        ]
    ];

        $customMessages = [
            'country_code.required' => 'Country Code is required',
            'country_code.unique' => 'Country Code already exists',
            'country_name.required' => 'Country Name is required',
            'country_name.unique' => 'Country Name already exists',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        // Check validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => 'false',
                'type' => 'error',
                'errors' => $validator->messages(),
            ]);
        }

        $data = $request->all();

        if ($this->countryService->updateCountry( $data)) {
            return response()->json([
                'status' => 'success',
                'type' => 'success',
                'message' => '/admin/countries',
            ]);
        }
    }

    public function destroy($id)
    {
        if ($this->countryService->deleteCountry($id)) {
            return response()->json([
                'status' => 'success',
                'type' => 'success',
                'message' => 'Country deleted successfully',
            ]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LocaleService;
use App\Services\CountryService;
use App\Services\CurrencyService;
use Validator;
use Illuminate\Validation\Rule;
class LocaleController extends Controller
{
    protected $localeService;
    protected $countryService;
    protected $currencyService;
    public function __construct(LocaleService $localeService, CountryService $countryService, CurrencyService $currencyService)
    {
        $this->localeService = $localeService;
        $this->countryService = $countryService;
        $this->currencyService = $currencyService;
    }

    public function index()
    {
        $locales = $this->localeService->getAllLocales();
        $countries = $this->countryService->getAllCountries();
        $currencies = $this->currencyService->getAllCurrencies();
        $languages = config('languages');
        $hostnames = config('hostname');
        $date_formats = config('dateFormat');
        // dd($dateformat);
        return view('admin.locales.index', compact('locales', 'countries', 'currencies', 'languages', 'hostnames', 'date_formats'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $rules = [
            'country' => 'required',
            'locale_code' => 'required|unique:locales,locale_code',
            'language' => 'required',


            'date_format' => 'required',
            'currency_id' => 'required',
            'timezone' => 'required',
            'direction' => 'required',
            'hostname' => 'required',

        ];

        $customMessages = [
            'locale_code.required' => 'Locale Code Required',
            'locale_code.unique' => 'Locale Code Must be Unique',
            'language.required' => 'language is required',
            'country.required' => 'country_id is required',
            'country.unique' => 'Locale Of this Country Alreday Available',
            'date_format.required' => 'date_format is required',
            'currency_id.required' => 'currency_id is required',
            'timezone.required' => 'timezone is required',
            'direction.required' => 'direction is required',
            'hostname.required' => 'hostname is required',
        ];

        $validator = Validator::make($data, $rules, $customMessages);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'false',
                'type' => 'error',
                'errors' => $validator->messages(),
            ]);
        }
        $data['country_id'] = $this->countryService->getCountryIdByCode($request->country);
       if($this->localeService->getCountryByCountryID($data['country_id'])->count()>0){
        return response()->json([
            'status' => 'false',
            'type' => 'exists',
            'message' => 'Locale of this Country Alreday Exists',
        ]);
       }
        $date_formats = config('dateFormat');
        $languages = config('languages');

        // $data['country_id'] = $this->countryService->getCountryIdByCode($request->country);
        $data['date_format'] = $date_formats[$data['date_format']]['date_format'];

        if ( $this->localeService->createLocale($data)) {
            return response()->json([
                'status' => 'success',
                'type' => 'success',
                'message' => '/admin/locales',
            ]);
        }

    }
public function edit($id){

    $locales = $this->localeService->getLocaleById($id);
    // dd($locales->country->code);
    if ($locales) {
        $date_formats = config('dateFormat');

// $countrycode=$locales->country->code;
$locales->countrycode=$locales->country->code;
$locales->date_format=$locales->country->code;
// dd($locales);
        return response()->json(['status' => 'success', 'data' => $locales]);
    }
    return response()->json(['status' => 'error', 'message' => 'Locale not found']);

}
    public function update(Request $request)
    {
        $data = $request->all();

        $rules = [
            'country' => 'required',
            'locale_code' =>[ 'required',
            Rule::unique('locales', 'locale_code')->ignore($request->id)],

            'language' => 'required',
            'date_format' => 'required',
            'currency_id' => 'required',
            'timezone' => 'required',
            'direction' => 'required',
            'hostname' => 'required',

        ];

        $customMessages = [
            'locale_code.required' => 'Locale Code Required',
            'locale_code.unique' => 'Locale Code Must be Unique',
            'language.required' => 'language is required',
            'country.required' => 'country_id is required',
            'country.unique' => 'Locale Of this Country Alreday Available',
            'date_format.required' => 'date_format is required',
            'currency_id.required' => 'currency_id is required',
            'timezone.required' => 'timezone is required',
            'direction.required' => 'direction is required',
            'hostname.required' => 'hostname is required',
        ];

        $validator = Validator::make($data, $rules, $customMessages);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'false',
                'type' => 'error',
                'errors' => $validator->messages(),
            ]);
        }
        $date_formats = config('dateFormat');
        $languages = config('languages');
        $data['country_id'] = $this->countryService->getCountryIdByCode($request->country);
        // Get the country ID for the current locale being processed (if applicable)
$currentCountryId = $this->localeService->getLocaleById($data['id'])->country_id; // Replace this with your method to get the current locale's country ID

$currentCountryId = $this->localeService->getLocaleById($data['id'])->country_id; // Replace this with your method to get the current locale's country ID

$existingLocales = $this->localeService->getCountryByCountryID($data['country_id']);
// $this->localeService->getCountryByCountryID($data['country_id'])->count()>0){
        //  return response()->json([
        //      'status' => 'false',
        //      'type' => 'exists',
        //      'message' => 'Locale of this Country Alreday Exists',
        //  ]);
        // }
        // $data['date_format'] = $date_formats[$data['date_format']]['date_format'];
        // dd($data);
        if ($existingLocales->count() > 0 && $existingLocales->first()->country_id != $currentCountryId) {
            return response()->json([
                'status' => 'false',
                'type' => 'exists',
                'message' => 'Locale of this Country Already Exists',
            ]);
        }
        $data['date_format'] = $date_formats[$data['date_format']]['date_format'];
        // dd($data);
        if (   $this->localeService->updateLocale($data)) {
            return response()->json([
                'status' => 'success',
                'type' => 'success',
                'message' => '/admin/locales',
            ]);
        }

        return redirect()->route('locales.index');
    }

    public function destroy($id)
    {
        $this->localeService->deleteLocale($id);
        return redirect()->route('locales.index');
    }


}

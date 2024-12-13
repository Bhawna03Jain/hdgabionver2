<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Services\CurrencyService;
use App\Services\LocaleService;
use Illuminate\Validation\Rule;

class CurrencyController extends Controller
{
    protected $currencyService;
    protected $localeService;
    public function __construct(CurrencyService $currencyService,LocaleService $localeService)
    {
        $this->currencyService = $currencyService;
        $this->localeService = $localeService;
    }

    public function index()
    {
        $currencies = $this->currencyService->getAllCurrencies();
        $basecurrency= $this->currencyService->getBaseCurrency();
        $currencies_intl=$this->localeService->getAllIntlCurrencies();
        // $symbol = Currencies::getSymbol('INR');
        // dd($currencies_intl);
        return view('admin.currencies.index', compact('currencies','basecurrency','currencies_intl'));
    }

    public function edit($id)
    {
        // Fetch the currency by ID using the service
        $currency = $this->currencyService->getCurrencyById($id);
        $basecurrency= $this->currencyService->getBaseCurrency()->currency_name;
        if ($currency) {
            return response()->json(['status' => 'success', 'data' => $currency,'basecurrency'=> $basecurrency]);
        }
        return response()->json(['status' => 'error', 'message' => 'Currency not found']);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        // Ensure is_base_currency is 1 or 0
        $data['is_base_currency'] = $request->has('is_base_currency') ? 1 : 0;

        // Perform validation, then pass $data to your service
        $rules = [
            'currency_code' => 'required|string|max:3|unique:currencies,currency_code',
            'currency_name' => 'required|string|max:255',
            'currency_symbol' => 'nullable|string|max:5',
            'is_base_currency' => 'boolean'
        ];

        $customMessages = [
            'currency_code.required' => 'Currency Code is required',
            'currency_code.unique' => 'Currency Code already exists',
            'currency_name.required' => 'Currency Name is required',
        ];

        $validator = Validator::make($data, $rules, $customMessages);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'false',
                'type' => 'error',
                'errors' => $validator->messages(),
            ]);
        }

        if ($this->currencyService->createCurrency($data)) {
            return response()->json([
                'status' => 'success',
                'type' => 'success',
                'message' => '/admin/currencies',
            ]);
        }
    }

    public function update(Request $request)
    {
        // dd("hi");
        $data = $request->all();

        // Ensure is_base_currency is 1 or 0
        $data['is_base_currency'] = $request->has('is_base_currency') ? 1 : 0;

        // Perform validation, then pass $data to your service
        $rules = [
            'currency_code' => [
                'required',
                'string',
                'max:3',
                Rule::unique('currencies', 'currency_code')->ignore($request->id),
            ],
            'currency_name' =>[ 'required','string','max:255',
            Rule::unique('currencies', 'currency_code')->ignore($request->id),],
            'currency_symbol' => 'nullable|string|max:5',
            'is_base_currency' => 'boolean',
        ];

        $customMessages = [
            'currency_code.required' => 'Currency Code is required',
            'currency_code.unique' => 'Currency Code already exists',
            'currency_name.required' => 'Currency Name is required',
            'name.unique' => 'Currency Code already exists',
        ];

        $validator = Validator::make($data, $rules, $customMessages);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'false',
                'type' => 'error',
                'errors' => $validator->messages(),
            ]);
        }

        if ($this->currencyService->updateCurrency($data)) {
            return response()->json([
                'status' => 'success',
                'type' => 'success',
                'message' => '/admin/currencies',
            ]);
        }
    }


    public function destroy($id)
    {
        if ($this->currencyService->deleteCurrency($id)) {
            return response()->json([
                'status' => 'success',
                'type' => 'success',
                'message' => 'Currency deleted successfully',
            ]);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Currency deletion failed',
        ]);
    }
}


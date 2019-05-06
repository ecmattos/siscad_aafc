<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\MemberRepository;
use SisCad\Repositories\PaymentRepository;
use SisCad\Repositories\PaymentReasonRepository;
use SisCad\Repositories\PaymentMethodRepository;

use Session;

class PaymentsController extends Controller
{
    private $paymentRepository;
    private $memberRepository;

    public function __construct(MemberRepository $memberRepository, PaymentRepository $paymentRepository)
    {
        $this->memberRepository = $memberRepository;
        $this->paymentRepository = $paymentRepository;
    }

    public function search(PaymentReasonRepository $payment_reasonRepository, PaymentMethodRepository $payment_methodRepository)
    { 
        session()->forget('srch_payment_reason_id');
        session()->forget('srch_payment_method_id');
        session()->forget('srch_payment_year');

        $payment_reasons = array(''=>'') + $payment_reasonRepository
            ->allPaymentReasons()
            ->pluck('description', 'id')
            ->all();

        $payment_methods = array(''=>'') + $payment_methodRepository
            ->allPaymentMethods()
            ->pluck('description', 'id')
            ->all();

        return view('payments.search', compact('payment_reasons', 'payment_methods'));
    }

    public function search_results(Requests\PaymentSearchRequest $request)
    { 
        $input = $request->all();

        $request->flash();

        session(['srch_payment_reason_id'   => $input['srch_payment_reason_id']]);
        session(['srch_payment_method_id'   => $input['srch_payment_method_id']]);
        session(['srch_payment_year'        => $input['srch_payment_year']]);

        $payments = $this->paymentRepository->searchPayments();

        return view('payments.search_results', compact('payments'));
    }

    public function search_results_back()
    { 
        $payments = $this->paymentRepository->searchPayments();

        return view('payments.search_results', compact('payments'));
    }

    public function edit()
    { 
    }

    public function destroy()
    { 
    }

    public function upload(PaymentReasonRepository $payment_reasonRepository, PaymentMethodRepository $payment_methodRepository)
    { 
        $payment_reasons = array(''=>'') + $payment_reasonRepository
            ->allPaymentReasons()
            ->pluck('description', 'id')
            ->all();

        $payment_methods = array(''=>'') + $payment_methodRepository
            ->allPaymentMethods()
            ->pluck('description', 'id')
            ->all();

        return view('payments.create', compact('payment_reasons', 'payment_methods'));
    }

    public function import(Requests\PaymentImportRequest $request, MemberRepository $memberRepository)
    {
        $input = $request->all();

        $input['payment_status_id'] = 1;
        $payment_status_id  = $input['payment_status_id'];
        
        $payment_reason_id  = $input['payment_reason_id'];
        
        $payment_method_id  = $input['payment_method_id'];
        
        $input['payment_date'] = \DateTime::createFromFormat('d/m/Y', $input['payment_date']);
        $input['payment_date'] = $input['payment_date']->format('Y-m-d');
        $payment_date  = $input['payment_date'];
        #dd($payment_date);

        $input['payment_date'] = \DateTime::createFromFormat('Y-m-d', $input['payment_date']);
        $input['payment_day'] = $input['payment_date']->format('d');
        $input['payment_month'] = $input['payment_date']->format('m');
        $input['payment_year'] = $input['payment_date']->format('Y');

        ##dd($input['payment_year']);

        $payment_file = $input['payment_import_file'];
        $payment_file_original_name = $payment_file->getClientOriginalName();
        Storage::disk('local_payments_files')->put($payment_file_original_name, File::get($payment_file));

        #Exclusao pagamentos com parametros iguais (Data, Motivo e Método) - Inicio
        $qty_payments = $this->paymentRepository->qtyPaymentsDateReasonMethod($payment_date, $payment_reason_id, $payment_method_id);
        #dd($qty_payments);

        if($qty_payments>0)
        {
           $payments = $this->paymentRepository->findPaymentsDateReasonMethod($payment_date, $payment_reason_id, $payment_method_id);
           #dd($payments);

           foreach($payments as $payment)
           {
                $this->paymentRepository->findPaymentById($payment->id)->delete();
           }
        }
        #Exclusao pagamentos com parametros iguais (Data, Motivo e Método) - Inicio

        #$payment_file_content = Storage::disk('local_payments_files')->get($payment_file_original_name);
        $payment_file_content = new \EasyCSV\Reader(public_path() . '/uploads/payments/' . $payment_file_original_name);

        $row_counter = 0;
        $row_counter_errors = 2;
        $row_member_code_errors = "";

        while ($row = $payment_file_content->getRow()) 
        {
            $member_code = $row['matricula'];
            var_dump($member_code."<br>");
            $members = $this->memberRepository->findMemberIdByCode($member_code);

            foreach($members as $member)
            {
                if(!is_null($member))
                {
                    $input['member_id'] = $member->id;

                    $numberFormatter_ptBR2en = new \NumberFormatter('pt_BR', \NumberFormatter::DECIMAL);
                    $input['payment_value'] = $numberFormatter_ptBR2en->parse($row['valor']);
                    #print_r($input['payment_value']."<br>");

                    switch($input['payment_month'])
                    {
                        case '1':
                            $input['payment_value_01'] = $input['payment_value'];
                        break;

                        case '2':
                            $input['payment_value_02'] = $input['payment_value'];
                        break;

                        case '3':
                            $input['payment_value_03'] = $input['payment_value'];
                        break;

                        case '4':
                            $input['payment_value_04'] = $input['payment_value'];
                        break;

                        case '5':
                            $input['payment_value_05'] = $input['payment_value'];
                        break;

                        case '6':
                            $input['payment_value_06'] = $input['payment_value'];
                        break;

                        case '7':
                            $input['payment_value_07'] = $input['payment_value'];
                        break;

                        case '8':
                            $input['payment_value_08'] = $input['payment_value'];
                        break;

                        case '9':
                            $input['payment_value_09'] = $input['payment_value'];
                        break;

                        case '10':
                            $input['payment_value_10'] = $input['payment_value'];
                        break;

                        case '11':
                            $input['payment_value_11'] = $input['payment_value'];
                        break;

                        case '12':
                            $input['payment_value_12'] = $input['payment_value'];
                        break;
                    }
                    
                    $payment = $this->paymentRepository->storePayment($input); 

                    $row_counter++;
                }
                else
                {
                    $row_counter_errors++;

                    dd($row_counter_errors);

                    $row_member_code_errors .= $row_member_code_errors.', '.$member_code;
                }
                
            }
           
        }

        #dd($row_counter_errors);

        Storage::disk('local_payments_files')->delete($payment_file_original_name);

        if($row_counter_errors=='0')
        {
            Session::flash('flash_message_success', 'Importação do arquivo de pagamentos contendo '.$row_counter.' registro(s) foi realizada com sucesso !');
        }
        else
        {
            Session::flash('flash_message_warning', 'Não foi possível importar '.$row_counter_errors.' registros do total de '.($row_counter + $row_counter_errors).' para os Sócios correspondentes as matrículas: '.$row_member_code_errors.'.');
        }

        #Armazena variaveis na sessao para redirecionar tela de pesquisa dos pagamentos
        session(['srch_payment_reason_id'   => $payment_reason_id]);
        session(['srch_payment_method_id'   => $payment_method_id]);
        session(['srch_payment_year'        => $input['payment_year']]);

        return redirect()->route('payments.search_results_back');
    }
}

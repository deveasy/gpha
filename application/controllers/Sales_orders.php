<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sales_orders extends CI_Controller {

	
	public function __construct(){
		parent::__construct();

		if(!$this->session->userdata('logged_in')){
            redirect('auth','refresh');
        }

		$this->load->model('sales_orders_model');

		$this->session_data = $this->session->userdata['logged_in'];
	}

	private $session_data;
	
	public function index()
	{
		$today = date('Y-m-d');
		$data['today'] = $today;
		$data['orders'] = $this->sales_orders_model->get_sales_by_date($today);
		$this->load->view('sales_orders/view_sales_orders',$data);
	}

	function sales_order($order_id){
		$data['order'] = $this->sales_orders_model->get_sales_order($order_id);
		$data['order_details'] = $this->sales_orders_model->get_sales_order_details($order_id);
		$this->load->view('sales_orders/view_sales_order', $data);
	}

	function new_sales_order(){
		$data['order_id'] = $this->new_order_id();
		$this->load->view('sales_orders/new_sales_order', $data);
	}

	function new_order_id(){
	}

	function submit_order(){
		$this->print_order();
	}

	function filter_by_date(){
		$order_date = $this->input->post('filter-date');
		$data['today'] = $order_date;
		$data['orders'] = $this->sales_orders_model->get_sales_by_date($order_date);
		$this->load->view('sales_orders/view_sales_orders', $data);
	}

	public function print_order($order_id){
		$order_details = $this->sales_orders_model->get_sales_order_details($order_id);
		$order = $this->sales_orders_model->get_sales_order($order_id);

		$pdf = new Pdf('P', 'mm', 'A5', true, 'UTF-8', false);
		$pdf->SetTitle('Invoice'.$order_id);
		$pdf->SetHeaderMargin(30);
		$pdf->SetTopMargin(36);
		$pdf->SetFooterMargin(20);
		$pdf->SetAutoPageBreak(true);
		$pdf->SetAuthor('AgeDave Enterprise ');
		$pdf->SetDisplayMode('real','default');

		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		$pdf->AddPage();

		// $pdf->Write(50, 'Some sample text');

		//set JPEG quality
		$pdf->setJPEGQuality(75);

		$pdf->Image('assets/img/company-logo-large.jpg', 55, 10, 100, 24, 'JPG', '', '', false, 150, '', false, false, 0, false, false, false);

		$html = '

		<h1 align="center">AGE DAVE ENTERPRISE</h1>
		<p align="center" style="margin: 0;">
			Dealers in all kinds of Provisions: Rice, Sugar, Oil, Flour<br>
			Post Office Box NK 19, North Kaneshie<br>
			Tel: 0302-388-247&nbsp;&nbsp;&nbsp;&nbsp;Mobile: 0243-213-140
		</p>
		<h2><strong>Invoice #:'. $order_id . '</strong></h2>
		<h3><strong>Cashier: '.$order->firstname.' </strong></h3>
                            <h3><strong>Date: '.$order->order_date.' </strong></h3>
                            <br>
                            <table width="100%" border="1" cellpadding="7">
                                <thead>
                                    <tr>
                                        <th><h3>Product Name</h3></th>
                                        <th><h3>Quantity</h3></th>
                                        <th><h3>Unit Price</h3></th>
                                        <th><h3>Amount</h3></th>
                                    </tr>
                                </thead>
                                <tbody>';
                                    if(!empty($order_details)){
                                        $total = 0.00;
                                        foreach($order_details as $detail){
                                            $html .= '<tr>';
                                            $html .= '<td>'.$detail->product_name.'</td>';
                                            $html .= '<td>'.$detail->quantity.'</td>';
                                            $html .= '<td>'.$detail->unit_price.'</td>';
                                            $html .= '<td>'.$detail->extended_price.'</td>';
                                            $html .= '</tr>';
                                            $total += $detail->extended_price;
                                        }
                                    }
                                    $html .= '<tr>
                                        <td colspan="3" align="right"><h3 class="amount" style="margin-right: 20px;">TOTAL AMOUNT (GHS)</h3></td>';
                                        $html .= '<td><h3 class="amount">'. number_format($total, 2) .'</h3></td>
                                    </tr>
                                </tbody>
                            </table>
                            <p>&nbsp;</p>
                            <table>
                            	<tr>
                            		<td></td>
                            		<td></td>
                            		<td></td>
                            		<td></td>
                            	</tr>
                            </table>';
        $pdf->writeHTML($html, true, 0, true, true);

        $pdf->lastPage();

		$pdf->Output('SalesOrder'.$order_id.'.pdf', 'I');
	}
}

/* End of file Sales_orders.php */
/* Location: ./application/controllers/Sales_orders.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if(!$this->session->userdata('logged_in')){
            redirect('auth','refresh');
        }

		$this->load->model('dashboard_model');

		date_default_timezone_set('GMT');
		$this->today = date('Y-m-d');
		$this->one_week_ago = date('Y-m-d', strtotime('-1 week'));
		$this->thirty_days_ago = date('Y-m-d', strtotime('-30 days'));
	}

	private $today;
	private $thirty_days_ago;
	private $one_week_ago;
	private $from_year_beginning;

	public function index()
	{
		$data['location_products'] = json_encode($this->chart_data_new('2017-08-30'));
		//$data['best_sellers'] = $this->dashboard_model->best_selling_products('2017-08-30');
		$data['total_orders'] = $this->dashboard_model->get_total_daily_sales_orders($this->today);
		$data['new_location_orders'] = $this->dashboard_model->get_total_location_orders('S1')->order_total;
		$data['old_location_orders'] = $this->dashboard_model->get_total_location_orders('S2')->order_total;
		$data['new_location_products'] = $this->dashboard_model->get_total_products_for_location('S1')->quantity;
		$data['old_location_products'] = $this->dashboard_model->get_total_products_for_location('S2')->quantity;
		$data['total_products'] = $this->dashboard_model->get_total_daily_products($this->today);

		$this->load->view('dashboard/dashboard_view', $data);
	}

	public function date_calculations(){
		echo 'today: ' . $this->today . '<br>';
		echo '1 week ago: ' . $this->one_week_ago . '<br>';
		echo '30 days: ' . $this->thirty_days_ago . '<br>';
		echo 'beginning of year' . $this->from_year_beginning . '<br>';
	}

	public function chart_data(){
		$locations = $this->dashboard_model->get_locations();
		$date = '2017-08-31';
		$chart_data = '';
		foreach ($locations as $location) {
			foreach($this->dashboard_model->get_total_products_for_each_location($location->location_id) as $key){
				if($key->location_name == '' && $key->quantity == ''){
					continue;
				}
				else{
					$chart_data .= '{label:"' . $key->location_name .'", value:' . $key->quantity . '}, ';
				}
			}
		}
		return $chart_data;
	}

	public function chart_data_new($date){
		return $this->dashboard_model->get_total_products_for_each_location($date);
		
	}

	public function gross_sales(){
		$this->load->view('dasboard/gross_sales_view');
	}

	public function product_sales(){
		$this->load->view('dashboard/product_sales_view');
	}

	public function best_sellers(){
		$this->load->view('dashboard/best_selling_products_view');
	}
}

/* End of file Welcome.php */
/* Location: ./application/controllers/Welcome.php */
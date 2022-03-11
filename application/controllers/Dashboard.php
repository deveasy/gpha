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
		$data['posts'] = $this->dashboard_model->get_posts();
		$this->load->view('dashboard/dashboard_view', $data);
	}

	public function date_calculations(){
		echo 'today: ' . $this->today . '<br>';
		echo '1 week ago: ' . $this->one_week_ago . '<br>';
		echo '30 days: ' . $this->thirty_days_ago . '<br>';
		echo 'beginning of year' . $this->from_year_beginning . '<br>';
	}

	public function new_post(){
		$data['posts'] = $this->dashboard_model->get_posts();
		$this->load->view('dashboard/add_post', $data);
	}

	public function add_post(){
		$this->dashboard_model->add_post();
		$this->session->set_flashdata('news_update','Update successfully addded.');

		redirect('dashboard/new_post');
	}

	public function post($post_id){
		$data['posts'] = $this->dashboard_model->get_posts();
		$data['post_details'] = $this->dashboard_model->get_post($post_id);
		$this->load->view('dashboard/view_post', $data);
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
}

/* End of file Welcome.php */
/* Location: ./application/controllers/Welcome.php */
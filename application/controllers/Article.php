<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Article extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('article_model','article');
    }

    public function index()
	{

        $data['logo']= array(
            'src'   => 'assets/img/logo150.png',
            'alt'   => 'Alie',
            'width' => '35',
            'title' => 'Alie',
        );

		$this->load->helper('url');
        /*
        $template = array(
            'table_open' => '<table class="dataTable hovered" id="table" data-searching="true">',
        );
        $this->table->set_template($template);
        $data['table'] = $this->table->generate($this->ajax_list() );
        */
        $this->load->view('header');
		$this->load->view('article_view', $data);
        $this->load->view('foot');
	}

    public function ajax_list()
	{
		$list = $this->article->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $article) {
			$no++;
			$row = array();
			$row[] = $article->article;
			$row[] = $article->sn;
			$row[] = $article->etat;
			$row[] = $article->emprunte;

			//add html for action
			$row[] = '<a class="image-button button primary" href="javascript:void()" title="Edit" onclick="edit_person('."'".$article->id."'".')">Modifier<span class=\'icon mif-pencil bg-darkCobalt\'></span></a>
				  <a class="button danger" href="javascript:void()" title="Hapus" onclick="delete_person('."'".$article->id."'".')">Delete</a>';

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->article->count_all(),
						"recordsFiltered" => $this->article->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

    public function ajax_edit($id)
	{
		$data = $this->article->get_by_id($id);
		echo json_encode($data);
	}

    public function ajax_add()
	{
		$data = array(
			'article' => $this->input->post('article'),
			'sn' => $this->input->post('sn'),
			'etat' => $this->input->post('etat'),
			'emprunte' => $this->input->post('emprunte'),
		);
		$insert = $this->article->save($data);
		echo json_encode(array("status" => TRUE));
	}

    public function ajax_update()
	{
		$data = array(
            'article' => $this->input->post('article'),
            'sn' => $this->input->post('sn'),
            'etat' => $this->input->post('etat'),
            'emprunte' => $this->input->post('emprunte'),
		);
		$this->article->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

    public function ajax_delete($id)
	{
		$this->article->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}



}



 ?>

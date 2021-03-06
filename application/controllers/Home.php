<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['logo']= array(
	        'src'   => 'assets/img/logo150.png',
	        'alt'   => 'Alie',
	        'width' => '35',
	        'title' => 'Alie',
		);


		$template = array(
        'table_open'            => '<table class="dataTable hovered" id="table" data-searching="true">',

				//'thead_open'            => '<thead>',
        //'thead_close'           => '</thead>',

        //'heading_row_start'     => '<tr>',
        //'heading_row_end'       => '</tr>',
        //'heading_cell_start'    => '<th>',
        //'heading_cell_end'      => '</th>',

        //'tbody_open'            => '<tbody>',
        //'tbody_close'           => '</tbody>',

        //'row_start'             => '<tr>',
        //'row_end'               => '</tr>',
        //'cell_start'            => '<td>',
        //'cell_end'              => '</td>',

        //'row_alt_start'         => '<tr>',
        //'row_alt_end'           => '</tr>',
        //'cell_alt_start'        => '<td>',
        //'cell_alt_end'          => '</td>',

        //'table_close'           => '</table>'

		);

		$this->table->set_template($template);

		//$query = $this->db->query('SELECT article as Article,sn as SN,etat as Etat, emprunte as Emprunté FROM article');
		$query = $this->db->query('SELECT * FROM article');
		$data['table'] = $this->table->generate($query);

		$this->load->view('head', $data);
		$this->load->view('home', $data);
		$this->load->view('foot', $data);



	}
}

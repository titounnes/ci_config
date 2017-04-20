<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $data = [];

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(['session','layout']);
		$this->load->helper(['url']);
	}

	public function report2column()
	{
		
		$path = str_replace('_','/',$this->uri->segments[3]);
		
		$this->load->config($this->uri->segments[1].'/'.$path);
		
		$config = $this->config->item('report2column');

		$this->load->library('Table2Column');
		
		$table = new Table2Column;
		$table->setTitle($config['format']['title']);

		$this->load->model('BaseModel');
		
		$data = $this->BaseModel->execute($config['argument'])->row();
		$table->setData($data);
		$table->setFormat($config['format']);		
		
		$table->render();

	}

	public function list()
	{
		
		$path = str_replace('_','/',$this->uri->segments[3]);
		
		$this->load->config($this->uri->segments[1].'/'.$path);
		
		$config = $this->config->item('list');

		$this->load->library('table');
		
		$table = new Table;
		$table->setTitle('Tabel Berita');

		$header = ['No.','Judul','Isi','Edit','Baca'];
		foreach($header as $h)
		{
			$table->setHeader($h);
		}
		$this->load->model('BaseModel');
		
		$data = $this->BaseModel->execute($config['argument'])->result();
		
		foreach($data as $k => $d)
		{
			$table->newRow($d->id);
			$table->setCell($k+1);
			$table->setCell($d->title);
			$table->setCell($d->content);
			$table->setAnchor($config['anchor']);
		}
		$table->render();

	}

	public function read()
	{
		if(!isset($this->uri->segments[4]) && ! isset($this->session->user_id))
		{
			echo 'Id belum ditentukan';
			return false;
		}

		if( isset($this->uri->segments[4]))
		{
			$this->data['id'] = $this->uri->segments[4];	
		}
		else
		{
			$this->data['id'] = $this->session->user_id;	
		}

		//mengubah _ menjadi /
		$path = str_replace('_','/',$this->uri->segments[3]);
		
		$this->load->config($this->uri->segments[1].'/'.$path);
		
		$config = $this->config->item('read');
		//var_dump($config);
		
		$this->load->model('BaseModel');
		$data = $this->BaseModel->execute($config['argument'])->row();
		//memanggil library table
		
		$this->load->library('blog');
		
		$blog = new Blog;
		$blog->setData($data);
		$blog->setAnchor($config['anchor']);
		
		$blog->render();		
	}

	public function form()
	{
		
		$path = str_replace('_','/',$this->uri->segments[3]);

		$this->data['id'] = isset($this->uri->segments[4]) ? $this->uri->segments[4] : '';
		$this->load->config($this->uri->segments[1].'/'.$path);
		
		$config = $this->config->item('form');

		if( isset($this->uri->segments[4]))
		{
			$this->data['id'] = $this->uri->segments[4];	
		}
		else if($this->session->user_id != null)
		{
			$this->data['id'] = $this->session->user_id;	
		}
		else
		{
			$this->data['id'] = '';
		}

		$data =  new StdClass;
	
		$this->session->set_userdata($path, $this->data['id']);
		if(isset($config['argument']) && $this->data['id'] != '')
		{
			$this->load->model('BaseModel');
			$data = $this->BaseModel->execute($config['argument'])->row();
		}

		$message = null;
		if(isset($this->session->validation_errors) && $this->session->validation_errors != null)
		{
			$message = $this->session->validation_errors; 	
		}
		
		$this->load->library('form');
		
		$form = new Form;

		$form->setData($data, $message);
		$form->setFormat($config['form']);
		$form->render();
	}

	function submit()
	{

		//mengubah _ menjadi /
		$this->load->library('form_validation');

		$path = str_replace('_','/',$this->uri->segments[3]);
		
		$this->load->config($this->uri->segments[1].'/'.$path);
		
		$config = $this->config->item('submit');


		foreach($config['validation'] as $v)
		{
			$this->form_validation->set_rules($v['field'], $v['label'], $v['rules']);
		}

		if($this->form_validation->run() === FALSE)
		{
			$post = [];
			foreach($config['post'] as $p)
			{
				$post[$p] = $this->input->post($p);
			}
			$this->session->set_flashdata('set_val', (object) $post);
			$this->session->set_flashdata('validation_errors', validation_errors());
			redirect('/' . $config['redirect']['error'] . '/' .$id);
			return false;
		}

		$this->load->model('BaseModel');

		$rows = $this->BaseModel->execute($config['check'])->num_rows();

		if($rows>0)
		{
			foreach($config['update']['field'] as $f)
			{
				$field[$f] = $this->input->post($f);
			}
				
			foreach($config['update']['where'] as $k=>$f)
			{
				$where[$k] = $this->session->{$f};
			}
			$this->BaseModel->update($config['update']['table'], $field, $where);
			$id = $this->session->user_id; 
		}
		else
		{
			if(!isset($config['insert']['table']) && isset($config['error']))
			{
				$this->session->set_flashdata('validation_errors', $config['error']['message']);
				redirect('/' . $config['error']['back']);
				return false;		
			}

			$table = $config['insert']['table'];
			foreach($config['insert']['field'] as $f)
			{
				$field[$f] = $this->input->post($f);
			}
			if(isset($config['insert']['session']))
			{
				foreach($config['insert']['session'] as $k=>$f)
				{
					$field[$k] = $this->session->{$f};
				}
			}
			if(isset($field['password']))
			{
				$field['password'] = password_hash( $field['password'],  PASSWORD_BCRYPT, ['cost'=>12]);	
			}
			$id = $this->BaseModel->insert($config['insert']['table'], $field);
			$this->session->set_userdata($path, $id);
		}

		redirect('/' . $config['redirect']['success']);
	}

	function auth()
	{

		$this->load->library('form_validation');

		$path = str_replace('_','/',$this->uri->segments[3]);
		
		$this->load->config($this->uri->segments[1].'/'.$path);
		
		$config = $this->config->item('auth');

		$this->data['email'] = $this->input->post('email');
		
		foreach($config['validation'] as $v)
		{
			$this->form_validation->set_rules($v['field'], $v['label'], $v['rules']);
		}

		if($this->form_validation->run() === FALSE)
		{
			$this->session->set_flashdata('validation_errors', validation_errors());
			redirect('/' . $config['redirect']['error'] . '/' .$id);
			return false;
		}

		$this->load->model('BaseModel');

		$auth = $this->BaseModel->execute($config['argument'])->row();
		if( $auth==null )
		{
			$this->session->set_flashdata('validation_errors', 'Email tidak terdaftar');
			redirect('/' . $config['redirect']['error'] );
			return false;
		}

		if( password_verify( $this->input->post('password'), $auth->password ))
		{
			$this->data['user_id'] = $auth->id;
			foreach($this->BaseModel->execute($config['roles'])->result() as $r)
			{
				$roles[] = $r->role_id;
			}
			$user = [
				'user_id' => $auth->id,
				'roles' => $roles,
				'identity' => $this->input->post('email'),
				'logedIn' => true,
			];
					
			$this->session->set_userdata($user);
			$this->session->set_flashdata('validation_errors', 'Login Berhasil');
			redirect('');
			return false;

		}
		else
		{
			$this->session->set_flashdata('validation_errors', 'Password salah');
			redirect('/' . $config['redirect']['error'] );
			return false;
		}
	}

	function signup()
	{
		$this->load->library('form_validation');

		$path = str_replace('_','/',$this->uri->segments[3]);
		
		$this->load->config($this->uri->segments[1].'/'.$path);
		
		$config = $this->config->item('signup');

		foreach($config['validation'] as $v)
		{
			$this->form_validation->set_rules($v['field'], $v['label'], $v['rules']);
		}

		if($this->form_validation->run() === FALSE)
		{
			$post = [];
			foreach($config['post'] as $p)
			{
				$post[$p] = $this->input->post($p);
			}
			$this->session->set_flashdata('set_val', (object) $post);
			
			$this->session->set_flashdata('validation_errors', validation_errors());
			redirect('/' . $config['redirect']['error'] . '/' .$id);
			return false;
		}

		$this->load->model('BaseModel');

		$table = $config['insert']['table'];
		foreach($config['insert']['field'] as $f)
		{
			$field[$f] = $this->input->post($f);
		}
		if(isset($field['password']))
		{
			$field['password'] = password_hash( $field['password'],  PASSWORD_BCRYPT, ['cost'=>12]);	
		}
		$id = $this->BaseModel->insert($config['insert']['table'], $field);
		if($id)
		{
			$role = [
				'user_id' => $id,
				'role_id' => 3,
			];
			$this->BaseModel->insert('user_role', $role);
			$this->session->set_userdata($post, $id);
			redirect('/' . $config['redirect']['success'] . '/' .$id);
		}
		else
		{
			$this->session->set_flashdata('validation_errors', 'Data gagal disimpan');
			redirect('/' . $config['redirect']['error'] );
		}		
				
	}

	function confirmation()
	{

		$path = str_replace('_','/',$this->uri->segments[3]);
		
		$this->load->config($this->uri->segments[1].'/'.$path);
		
		$config = $this->config->item('confirmation');

		$this->load->library('confirmation');
		$confirm = new Confirmation;

		if(isset($config['argument']))
		{
			$this->load->model('BaseModel');
			$this->data['id'] = $this->uri->segments[4];

			$data = $this->BaseModel->execute($config['argument'])->row();

			$confirm->setData($data);
		
		}

		$confirm->setFormat($config['html']);
		$confirm->render();

	}

	function signout()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('validation_errors', 'Anda telah logout');
		redirect('');			
	}

	function upload()
	{

		$path = str_replace('_','/',$this->uri->segments[3]);
		
		$this->load->config($this->uri->segments[1].'/'.$path);
		
		$config = $this->config->item('upload');

		$this->load->library('upload', $config['upload']);
        
        if ( ! $this->upload->do_upload($config['file'])) 
        {
            $this->session->set_flashdata('validation_errors', $this->upload->display_errors());
			redirect('/' . $config['redirect']['error'] . '/' .$id);
			return false;
        }
		
		$path = $config['upload']['upload_path'];

		$handle = fopen($path. $this->upload->file_name, 'r');
	    $content = @fread($handle, filesize($path . $this->upload->file_name));
		fclose($handle);
	           
		$file = $path . $this->session->user_id . '.dat';
		
		$handle=fopen($file, 'w');
		@fwrite($handle,gzcompress($content));
		fclose($handle);
	            
		unlink($path . $this->upload->file_name);
	       
		redirect('/' . $config['redirect']['success']);
         
	}

	function download()
	{
		$path = str_replace('_','/',$this->uri->segments[3]);
		$this->load->library('encryption');

		$target =  $this->encryption->decrypt(urldecode($this->uri->segments[4]));

		if(! $target)
		{
			?>
			<h3>Halaman Download </h3>
			<div class="alert alert-warning"><strong>Warning!</strong> Tautan yang anda gunakan sudah kadaluwarsa</div>
			<?php
			return false;
		}
		$name = str_replace('/', '_', $target);
		$file = fopen(APPPATH . 'writeable/'.$target.'.dat','r');
		$content = @fread($file, filesize(APPPATH . 'writeable/'.$target.'.dat'));
		fclose($file);
		$this->output->set_header('HTTP/1.0 200 OK')
			->set_header('HTTP/1.1 200 OK')
			->set_header('Cache-Control: no-store, no-cache, must-revalidate')
			->set_header('Cache-Control: pos t-check=0, pre-check=0')
			->set_header('Pragma: no-cache')
			->set_content_type('application/docx')
			->set_header('Content-Disposition: inline; filename="'.$name.'.docx"')
		    ->set_output(gzuncompress($content));
	}

}


<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kota2422500066_controller extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        is_admin_logged_in();
        $this->load->model('kota2422500066_model');
    }

    public function index() {
        $data['list_kota'] = $this->kota2422500066_model->get_all();
        $this->load->view('administrator/templates/header');
        $this->load->view('administrator/templates/sidebar');
        $this->load->view('administrator/kota2422500066/index', $data);
        $this->load->view('administrator/templates/footer');
    }

    public function tambah_kota()
    {
        $data['title'] = 'Tambah Kota';

        $this->form_validation->set_rules('nama_kota066', 'Nama Kota', 'required');
        $this->form_validation->set_rules('jenis_kota066', 'Jenis Kota', 'required');
        $this->form_validation->set_rules('provinsi066', 'Provinsi', 'required');
        $this->form_validation->set_rules('status066', 'Status', 'required');

        if ($this->form_validation->run() !== FALSE) {
            $this->__simpan_kota();
        } else {
            $this->load->view('administrator/templates/header', $data);
            $this->load->view('administrator/templates/sidebar');
            $this->load->view('administrator/kota2422500066/tambah_kota');
            $this->load->view('administrator/templates/footer');
        }
    }

    private function __simpan_kota()
    {
        $data = [
            'nama_kota066' => ucwords($this->input->post('nama_kota066')),
            'jenis_kota066' => $this->input->post('jenis_kota066'),
            'provinsi066' => ucwords($this->input->post('provinsi066')),
            'status066' => $this->input->post('status066')
        ];
        $simpan = $this->kota2422500066_model->tambah($data);
        if ($simpan) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <div>
                    Berhasil menambahkan kota!!
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ');
        } else {
            $this->session->set_flashdata('message', '
            <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                    <use xlink:href="#exclamation-triangle-fill" />
                </svg>
                <div>
                    Gagal menambahkan kota!!
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ');
        }
        redirect('admin/kota');
    }

    public function hapus_kota($id)
    {
        // check apakah ada kota
        $kota = $this->kota2422500066_model->get_by_id($id);
        if ($kota) {
            $hapus = $this->kota2422500066_model->hapus($id);
            if ($hapus) {
                $this->session->set_flashdata('message', '
                <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <div>
                    Berhasil menghapus kota!!
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
                ');
            } else {
                $this->session->set_flashdata('message', '
                <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                    <use xlink:href="#exclamation-triangle-fill" />
                </svg>
                <div>
                    Gagal menghapus kota!!
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
                ');
            }
            redirect('admin/kota');
        } else {
            $this->session->set_flashdata('message', '
            <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                    <use xlink:href="#exclamation-triangle-fill" />
                </svg>
                <div>
                    Kota tidak ditemukan!!
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ');
            redirect('admin/kota');
        }
    }

    public function ubah_kota($id)
    {
        // check dulu apakah id dengan kota ada?
        $kota = $this->kota2422500066_model->get_by_id($id);
        if ($kota) {
            $this->form_validation->set_rules('nama_kota066', 'Nama Kota', 'required');
            $this->form_validation->set_rules('jenis_kota066', 'Jenis Kota', 'required');
            $this->form_validation->set_rules('provinsi066', 'Provinsi', 'required');
            $this->form_validation->set_rules('status066', 'Status', 'required');
            if ($this->form_validation->run() !== FALSE) {
                $this->__ubah_kota($id);
            } else {
                $data['title'] = 'Ubah Kota';
                $data['kota'] = $kota;
                $this->load->view('administrator/templates/header', $data);
                $this->load->view('administrator/templates/sidebar');
                $this->load->view('administrator/kota2422500066/ubah_kota', $data);
                $this->load->view('administrator/templates/footer');
            }
        } else {
            $this->session->set_flashdata('message', '
            <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                    <use xlink:href="#exclamation-triangle-fill" />
                </svg>
                <div>
                    Kota tidak ditemukan!!
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ');
            redirect('admin/kota');
        }
    }

    private function __ubah_kota($id)
    {
        $data = [
            'nama_kota066' => ucwords($this->input->post('nama_kota066')),
            'jenis_kota066' => $this->input->post('jenis_kota066'),
            'provinsi066' => ucwords($this->input->post('provinsi066')),
            'status066' => $this->input->post('status066')
        ];
        $ubah = $this->kota2422500066_model->ubah($data, $id);
        if ($ubah) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <div>
                    Berhasil mengubah kota!!
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ');
        } else {
            $this->session->set_flashdata('message', '
            <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                    <use xlink:href="#exclamation-triangle-fill" />
                </svg>
                <div>
                    Gagal mengubah kota!!
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ');
        }
        redirect('admin/kota');
    }
}
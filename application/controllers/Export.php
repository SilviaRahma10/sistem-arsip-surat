<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Export extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logout();
        $this->load->model('Sm_model', 'sm');
        $this->load->model('Sk_model', 'sk');
        $this->load->library('dompdf_gen'); // load library dompdf
    }
    
    public function openfile($file)
    {
        // Lokasi file 
        $filename = "./uploads/" . $file;

        if (file_exists($filename)) {
            // check jika ekstensi file (pdf/docx/image) maka
            $ext = pathinfo($file, PATHINFO_EXTENSION);

            if ($ext == 'pdf') {
                header('Content-type: application/pdf');
                header('Content-Disposition: inline; filename"' . $filename . '"');
                header('Content-Transfer-Encoding: binary');
                header('Accept-Ranges: bytes');
                @readfile($filename);
            } elseif ($ext == 'png' || 'jpg' || 'jpeg') {
                header('Content-type: image/png');
                echo file_get_contents($filename);
            }
        } else {
            echo 'file tidak ditemukan, <a href="' . base_url('galeri/surat-masuk') . '"> kembali </a>';
        }
    }

    public function download($file)
    {
        force_download('./uploads/' . $file, null);
    }

    public function pdfSm()
    {
        if (isset($_POST['pdf'])) {

            $data = [
                'sm' => $this->sm->fetch_data()
            ];

            $this->load->view('export/pdf-sm', $data);

            // konfigurasi dompdf
            $paper_size = 'A4';
            $orientation = 'landscape';
            $html = $this->output->get_output();
            $this->dompdf->set_paper($paper_size, $orientation);

            $this->dompdf->load_html($html);
            $this->dompdf->render();
            $this->dompdf->stream('Laporan Surat Masuk.pdf', ['Attachment' => true]); // false atau 0 untuk preview sebelum download

            exit;
        }

        return redirect('auth/notfound');
    }

    public function pdfSk()
    {
        if (isset($_POST['pdf'])) {

            $data = [
                'sk' => $this->sk->fetch_data()
            ];

            $this->load->view('export/pdf-sk', $data);

            // konfigurasi dompdf
            $paper_size = 'A4';
            $orientation = 'landscape';
            $html = $this->output->get_output();
            $this->dompdf->set_paper($paper_size, $orientation);

            $this->dompdf->load_html($html);
            $this->dompdf->render();
            $this->dompdf->stream('Laporan Surat Keluar.pdf', ['Attachment' => true]);

            exit;
        }

        return redirect('auth/notfound');
    }

    public function excelSm()
    {
        if (isset($_POST['excel'])) {
            $data = [
                'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
                'surat-masuk' => $this->sm->fetch_data()
            ];

            // panggil phpexcel
            require(APPPATH . 'third_party/PHPExcel/Classes/PHPExcel.php');
            require(APPPATH . 'third_party/PHPExcel/Classes/PHPExcel/Writer/Excel2007.php');

            // instansiasi
            $object = new PHPExcel();
            $sheet = $object->getActiveSheet();

            // konfigurasi
            $object->getProperties()->setCreator("SMK Negeri 1 Nisam")
                ->setLastModifiedBy($data['user']['name'])
                ->setTitle("Daftar Surat Masuk")
                ->setSubject("Surat Masuk")
                ->setDescription("Laporan Semua Data Surat Masuk")
                ->setKeywords("Data Surat Masuk");

            $object->setActiveSheetIndex(0);
            // $sheet->mergeCells('A1:A2');
            $sheet->setCellValue('A1', 'NO');
            $sheet->setCellValue('B1', 'NO AGENDA');
            $sheet->setCellValue('C1', 'PENGIRIM');
            $sheet->setCellValue('D1', 'NO SURAT');
            $sheet->setCellValue('E1', 'ISI RINGKAS');
            $sheet->setCellValue('F1', 'TANGGAL SURAT');
            $sheet->setCellValue('G1', 'TANGGAL DITERIMA');
            $sheet->setCellValue('H1', 'KETERANGAN');

            $style = array(
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                )
            );

            $sheet->getParent()->getDefaultStyle()->applyFromArray($style);

            $baris = 2;
            $no = 1;

            foreach ($data['surat-masuk'] as $row) {
                $sheet->setCellValue('A' . $baris, $no++);
                $sheet->setCellValue('B' . $baris, $row->no_agenda);
                $sheet->setCellValue('C' . $baris, $row->pengirim);
                $sheet->setCellValue('D' . $baris, $row->no_surat);
                $sheet->setCellValue('E' . $baris, $row->isi);
                $sheet->setCellValue('F' . $baris, date('d/m/Y', strtotime($row->tgl_surat)));
                $sheet->setCellValue('G' . $baris, date('d/m/Y', strtotime($row->tgl_diterima)));
                $sheet->setCellValue('H' . $baris, $row->keterangan);

                $baris++;
            }

            $filename = "Data Surat Masuk" . ".xlsx";

            $sheet->setTitle("Data Surat Masuk");

            header('Content-Type: application/vnd.openxmlformat-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="' . $filename . '"');
            header('Cache-Control: max-age=0');

            $writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
            $writer->save('php://output');

            exit;
        }
        // jika bukan melalui tombol excel
        return redirect('auth/notfound');
    }

    public function excelSk()
    {
        if (isset($_POST['excel'])) {
            $data = [
                'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
                'surat-keluar' => $this->sk->fetch_data()
            ];

            require(APPPATH . 'third_party/PHPExcel/Classes/PHPExcel.php');
            require(APPPATH . 'third_party/PHPExcel/Classes/PHPExcel/Writer/Excel2007.php');

            $object = new PHPExcel();
            $sheet = $object->getActiveSheet();

            $object->getProperties()->setCreator("SMK Negeri 1 Nisam")
                ->setLastModifiedBy($data['user']['name'])
                ->setTitle("Daftar Surat Keluar")
                ->setSubject("Surat Keluar")
                ->setDescription("Laporan Semua Data Surat Keluar")
                ->setKeywords("Data Surat Keluar");

            $object->setActiveSheetIndex(0);
            $sheet->setCellValue('A1', 'NO');
            $sheet->setCellValue('B1', 'NO AGENDA');
            $sheet->setCellValue('C1', 'PENGIRIM');
            $sheet->setCellValue('D1', 'NO SURAT');
            $sheet->setCellValue('E1', 'ISI RINGKAS');
            $sheet->setCellValue('F1', 'TANGGAL SURAT');
            $sheet->setCellValue('G1', 'TANGGAL DITERIMA');
            $sheet->setCellValue('H1', 'KETERANGAN');

            $style = array(
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                )
            );

            $sheet->getParent()->getDefaultStyle()->applyFromArray($style);

            $baris = 2;
            $no = 1;

            foreach ($data['surat-keluar'] as $row) {
                $sheet->setCellValue('A' . $baris, $no++);
                $sheet->setCellValue('B' . $baris, $row->no_agenda);
                $sheet->setCellValue('C' . $baris, $row->pengirim);
                $sheet->setCellValue('D' . $baris, $row->no_surat);
                $sheet->setCellValue('E' . $baris, $row->isi);
                $sheet->setCellValue('F' . $baris, date('d/m/Y', strtotime($row->tgl_surat)));
                $sheet->setCellValue('G' . $baris, date('d/m/Y', strtotime($row->tgl_diterima)));
                $sheet->setCellValue('H' . $baris, $row->keterangan);

                $baris++;
            }

            $filename = "Data Surat Keluar" . ".xlsx";

            $object->getActiveSheet()->setTitle("Data Surat Masuk");

            header('Content-Type: application/vnd.openxmlformat-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="' . $filename . '"');
            header('Cache-Control: max-age=0');

            $writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
            $writer->save('php://output');

            exit;
        }
        // jika bukan melalui tombol excel
        return redirect('auth/notfound');
    }
}

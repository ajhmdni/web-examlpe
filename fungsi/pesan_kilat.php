<?php
function set_flashdata($key = "", $value = "")
{
    if (!empty($key) && !empty($value)) {
        $_SESSION['_flashdata'][$key] = $value;
        /**
         * disini mendefinisikan session berdasarkan 
         * key dan value yang dijadikan argument
         */
        return true;
    }
    return false;
    /**
     * Jika argument key dan value tidak ada maka 
     * akan return false
     */
}

function get_flashdata($key = '')
{
    if (!empty($key) && isset($_SESSION['_flashdata'][$key])) {
        $data = $_SESSION['_flashdata'][$key];
        unset($_SESSION['_flashdata'][$key]);
        /**
         * unset digunakan untuk menghapus data pada sebuah variable 
         * dalam hal ini menghapus data pada session berdasarkan key tertentu.
         * jadi program ini ketika mendefinisikan flash_message, dan ketika 
         * menjalankan getter function ini maka akan mengambil data
         * kemudian menghapus data pada key dan setelah itu data dikembalikan.
         */
        return $data;
    } else {
        echo "<script>alert('Flash Message\'{$key}\' is not defined.')</script>";
    }
}

function pesan($key = "", $pesan = "")
{
    if ($key == "info") {
        set_flashdata(
            "info",
            "<div class='alert alert-primary alert-dismissable fade show' role='alert'>
                <strong>Info! </strong> {$pesan}
                <button type='button' class='btn btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>"
        );
    } elseif ($key == "danger") {
        set_flashdata(
            "info",
            "<div class='alert alert-danger alert-dismissable fade show' role='alert'>
                <strong>Gagal! </strong> {$pesan}
                <button type='button' class='btn btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>"
        );
    } elseif ($key == "warning") {
        set_flashdata(
            "info",
            "<div class='alert alert-warning alert-dismissable fade show' role='alert'>
                <strong>Peringatan! </strong> {$pesan}
                <button type='button' class='btn btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>"
        );
    } elseif ($key == "success") {
        set_flashdata(
            "info",
            "<div class='alert alert-success alert-dismissable fade show' role='alert'>
                <strong>Berhasil! </strong> {$pesan}
                <button type='button' class='btn btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>"
        );
    }
}

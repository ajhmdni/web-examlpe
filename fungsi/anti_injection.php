<?php
function antiinjection($koneksi, $data)
{
    $filter_sql = mysqli_real_escape_string($koneksi, stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES))));
    /**
     * function mysqli_real_escape_string is used to create a legal SQL string to use in
     * SQL statement
     */
    return $filter_sql;
}

<html>

<head>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #000000;
            text-align: center;
        }
    </style>
</head>

<body>
    <div style="font-size: 64px; color: #dddddd;"><i>Invoice</i></div>
    <p>
        <i>Ci4 Shop</i><br>
        Papua, Jayapura <br>
        009823 <br>
    </p>
    <p>
        Pembeli : <?= $pembeli->username; ?><br>
        Alamat : <?= $transaksi->alamat; ?><br>
        Transaksi No : <?= $transaksi->no; ?><br>
        Tanggal : <?= date('Y-m-d', strtotime($transaksi->created_date)); ?>
    </p>
    <table cellpadding="6">
        <tr>
            <th><strong>Barang</strong></th>
            <th><strong>Harga Satuan</strong></th>
            <th><strong>Jumlah</strong></th>
            <th><strong>Ongkir</strong></th>
            <th><strong>Total</strong></th>
        </tr>
        <tr>
            <td><?= $barang->nama; ?></td>
            <td><?= number_format($barang->harga, '0', '', '.'); ?></td>
            <td><?= $transaksi->jumlah; ?></td>
            <td><?= number_format($transaksi->ongkir, '0', '', '.'); ?></td>
            <td><?= number_format($transaksi->total_harga, '0', '', '.'); ?></td>
        </tr>
    </table>
</body>

</html>
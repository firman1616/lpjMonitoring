<?php
class M_COA extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  function getCOA()
  {
    return $this->db->query("SELECT
      xc.id,
      xc.name as no_coa,
      xc.x_tanggal_pemeriksaan,
      xc.x_nama_barang,
      xc.x_customer,
      xc.create_date,
      sp.name as no_sjk
    from
      x_coa xc
    left join stock_picking sp on sp.id = xc.x_stock_id 
    where xc.create_date BETWEEN NOW() - INTERVAL '12 months' AND NOW() order by xc.name desc");
  }

  function cetak_coa($coa)
  {
    return $this->db->query("SELECT
      xc.name,
      sp.name as no_sjk,
      xc.x_customer,
      xc.x_nama_barang ,
      xc.x_tanggal_pemeriksaan,
      xc.x_tanggal_kirim,
      xc.x_po_customer,
      xc.x_jumlah,
      xc.x_keterangan,
      xc.x_kode_material,
      xc.x_gramature,
      xc.x_thickness,
      xc.x_apperance,
      xc.x_colour,
      xc.x_diecut,
      xc.x_glueing,
      xc.x_lenght,
      xc.x_width,
      xc.x_shelflife,
      xc.create_uid,
      rp.name AS user,
      xc.create_date
    from
      x_coa xc
    left join stock_picking sp on sp.id = xc.x_stock_id
    LEFT JOIN res_users ru ON ru.id = xc.create_uid
    LEFT JOIN res_partner rp ON rp.id = ru.partner_id
    where
      xc.id = '$coa'");
  }

  function det_coa($coa)
  {
    return $this->db->query("SELECT
      xc.id,
      spl.name as no_lot,
      xcl.qty,
      TO_CHAR(mp.date_planned_start, 'YYYY-MM-DD') as tgl_produksi,
      TO_CHAR(mp.date_planned_start + INTERVAL '6 month', 'YYYY-MM-DD') as tgl_expired
    from
      x_coa xc
    left join x_coa_line xcl on
      xcl.coa_id = xc.id
    left join stock_production_lot spl on
      spl.id = xcl.lot_id
    left join mrp_production mp on
      mp.x_barcode_ok = substring(spl.name,1,7)
    where
      xc.id = '$coa'");
  }
}

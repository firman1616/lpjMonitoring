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
          pu.name AS uom,
          TO_CHAR(mp.date_planned_start, 'YYYY-MM-DD') as tgl_produksi,
          TO_CHAR(mp.date_planned_start + INTERVAL '6 month', 'YYYY-MM-DD') as tgl_expired
    FROM
          x_coa xc
    LEFT JOIN x_coa_line xcl ON xcl.coa_id = xc.id
    LEFT JOIN stock_production_lot spl ON spl.id = xcl.lot_id
    LEFT JOIN (
        SELECT DISTINCT ON (x_barcode_ok) 
            x_barcode_ok, date_planned_start 
        FROM mrp_production 
        ORDER BY x_barcode_ok, date_planned_start ASC
    ) mp ON mp.x_barcode_ok = substring(spl.name,1,7)
    LEFT JOIN product_uom pu 
    ON pu.id = spl.product_uom_id
    WHERE
          xc.id = '$coa'");
  }

  function lot_aji($coa)
  {
    return $this->db->query("WITH lot_data AS (
        SELECT 
            spl.name AS no_lot,
            CAST(SUBSTRING(spl.name FROM '[0-9]+$') AS INTEGER) AS lot_number,
            mp.date_planned_start
        FROM x_coa xc
        LEFT JOIN x_coa_line xcl ON xcl.coa_id = xc.id
        LEFT JOIN stock_production_lot spl ON spl.id = xcl.lot_id
        LEFT JOIN (
            SELECT DISTINCT ON (x_barcode_ok) 
                x_barcode_ok, date_planned_start 
            FROM mrp_production 
            ORDER BY x_barcode_ok, date_planned_start ASC
        ) mp ON mp.x_barcode_ok = substring(spl.name, 1, 7)
        WHERE xc.id = '$coa'
    )
    SELECT
        (SELECT no_lot FROM lot_data ORDER BY lot_number ASC LIMIT 1) || ' - ' ||
        (SELECT no_lot FROM lot_data ORDER BY lot_number DESC LIMIT 1) AS no_lot,
        TO_CHAR(MIN(date_planned_start), 'YYYY-MM-DD') AS tgl_produksi,
        TO_CHAR(MIN(date_planned_start + INTERVAL '6 month'), 'YYYY-MM-DD') AS tgl_expired
    FROM lot_data");
  }

  function pl_header($id)
  {
    return $this->db->query("SELECT
      xc.id,
      xc.x_nama_barang,
      xc.x_stock_id,
      xc.x_tanggal_kirim 
    from
      x_coa xc
    where
      xc.id = '$id'");
  }
}

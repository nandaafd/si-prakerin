<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class WoKikppc extends Model
{
    use HasFactory;

    // New Query
    public function get_wo($tanggal)
    {
        // SUBSTRING ( wow.kd_patrun, 8, 4 ) as kd_patrun,
        // wow.wow_date = '2022-07-28'
        $get_wo = DB::connection('pgsql')->select("SELECT 
            wow.wow_no as no_kik,
            wow.wow_date,
            wow.wow_date,
            wow.kd_patrun,
            wow.kd_tmb,
            wow.LENGTH,
            wow.pattern_no as no_bukti,
            wow.pattern_id,
            a.prd_code, 
            apd.pattern_id, 
            sum(apd.qty_helai) as jml_lusi,
            apd.patt_cat_desc
        from
            prod.work_order_weaving wow
        left join im_prd_master as a on prd_id = a.id
        left join prod.atm_pattern_detail apd on apd.pattern_id = wow.pattern_id
        WHERE patt_cat_desc = 'LUSI' and wow.wow_date = '$tanggal'
        group by
                apd.patt_cat_desc,
                wow.wow_no,
                wow.wow_date,
                wow.kd_patrun,
                wow.kd_tmb,
                wow.length,
                wow.pattern_no,
                wow.pattern_id,
                a.prd_code,
                apd.pattern_id");
        return $get_wo;
    }
    // // -- WHERE wow.wow_date between '2022-07-25' and '2022-07-25'
    // where wow_no = 'Q8D5'

    public function get_lusi($wo)
    {
        return DB::connection('pgsql')
            ->select("SELECT
            wow.wow_no, 
            apd.patt_cat_desc,
            apd.qty_kg,
            apd.no_urut,
            ipmd.barcode
        from
            prod.work_order_weaving wow
        left join prod.atm_pattern_detail apd on
            wow.pattern_id = apd.pattern_id
        left join im_prd_master_detail ipmd on apd.rm_det_id = ipmd.id 
        where
            wow_no = '$wo'
            and apd.patt_cat_desc = 'LUSI'
            group by ipmd.barcode,wow.wow_no, apd.patt_cat_desc, apd.qty_kg, apd.no_urut");
    }

    public function get_pakan($wo)
    {
        return DB::connection('pgsql')
            ->select("SELECT
            wow.wow_no,
            sum(apd.qty_kg) as qty_kg,
            apd.no_urut,
            ipmd.barcode
        from
            prod.work_order_weaving wow
        left join prod.atm_pattern_detail apd on
            wow.pattern_id = apd.pattern_id
        left join im_prd_master_detail ipmd on apd.rm_det_id = ipmd.id 
        where
            wow_no = '$wo'
            and apd.patt_cat_desc in ('PAKAN','PAKAN JHT') 
            group by ipmd.barcode,wow.wow_no, apd.no_urut ");
    }

    // tumpal
    public function get_tumpal($wo)
    {
        return DB::connection('pgsql')
            ->select("SELECT
            wow.wow_no,
            sum(apd.qty_kg) as qty_kg,
            apd.no_urut,
            ipmd.barcode
        from
            prod.work_order_weaving wow
        left join prod.atm_pattern_detail apd on
            wow.pattern_id = apd.pattern_id
        left join im_prd_master_detail ipmd on apd.rm_det_id = ipmd.id 
        where
            wow_no = '$wo'
            and apd.patt_cat_desc in ('TUMPAL','PAKAN TPL') 
            group by ipmd.barcode,wow.wow_no, apd.no_urut ");
    }

    // Sulur
    public function get_sulur($wo)
    {
        return DB::connection('pgsql')
            ->select("SELECT
            wow.wow_no, 
            apd.patt_cat_desc,
            apd.qty_kg,
            apd.no_urut,
            ipmd.barcode
        from
            prod.work_order_weaving wow
        left join prod.atm_pattern_detail apd on
            wow.pattern_id = apd.pattern_id
        left join im_prd_master_detail ipmd on apd.rm_det_id = ipmd.id 
        where
            wow_no = '$wo'
            and apd.patt_cat_desc = 'SULUR'
            group by ipmd.barcode,wow.wow_no, apd.patt_cat_desc, apd.qty_kg, apd.no_urut");
    }
    // Fix query 11 Agustus 2022
}

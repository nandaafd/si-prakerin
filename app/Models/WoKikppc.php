<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class WoKikppc extends Model
{
    use HasFactory;

    // New Query
    public function get_wo($bulan, $tahun)
    // $param
    {
        // SUBSTRING ( wow.kd_patrun, 8, 4 ) as kd_patrun,
        // wow.wow_date = '2022-07-28'
        $get_wo = DB::connection('pgsql')->select("SELECT 
            wow.wow_no as no_kik,
            wow.wow_date,
            wow.kd_patrun,
            wow.kd_tmb,
            wow.LENGTH,
            wow.pattern_no as no_bukti,
            wow.pattern_id,
            a.prd_code, 
            apd.pattern_id, 
            sum(apd.qty_helai) as jml_lusi,
            apd.patt_cat_desc,
            ipm.motive_name,
            mwse.no_sisir_fx,
            mwse.no_pick
        from
            prod.work_order_weaving wow
        left join im_prd_master as a on prd_id = a.id
        left join prod.atm_pattern_detail apd on apd.pattern_id = wow.pattern_id
        left join im_prd_motive ipm on wow.motive_id = ipm.id
        left join ms_weaving_standard_erp2 mwse on mwse.id_prd = a.id
        WHERE patt_cat_desc = 'LUSI' and EXTRACT(month from wow_date) = '$bulan' and EXTRACT(year from wow_date) = '$tahun'
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
                apd.pattern_id,
                ipm.motive_name,
                mwse.no_sisir_fx,
            	mwse.no_pick");
        return $get_wo;
    }
    // // -- WHERE wow.wow_date between '2022-07-25' and '2022-07-25'
    // where wow_no = 'Q8D5' 2022-08-20

    public function get_lusi($wo)
    {
        return DB::connection('pgsql')
            ->select("SELECT
            wow.wow_no, 
            apd.patt_cat_desc,
            apd.qty_kg,
            apd.no_urut,
            ipmd.barcode,
            ipm.short_desc,
            mwse.no_sisir_fx,
            mwse.no_pick
        from
            prod.work_order_weaving wow
        left join prod.atm_pattern_detail apd on
            wow.pattern_id = apd.pattern_id
        left join im_prd_master_detail ipmd on apd.rm_det_id = ipmd.id
        left join im_prd_master ipm on ipm.id = ipmd.prd_id
        left join ms_weaving_standard_erp2 mwse on mwse.id_prd = ipm.id 
        where
            wow_no = '$wo'
            and apd.patt_cat_desc = 'LUSI'
            group by ipmd.barcode,wow.wow_no, apd.patt_cat_desc, apd.qty_kg, apd.no_urut, ipm.short_desc, mwse.no_sisir_fx, mwse.no_pick");
    }

    public function get_pakan($wo)
    {
        return DB::connection('pgsql')
            ->select("SELECT
            wow.wow_no,
            sum(apd.qty_kg) as qty_kg,
            apd.no_urut,
            ipmd.barcode,
            ipm.short_desc
        from
            prod.work_order_weaving wow
        left join prod.atm_pattern_detail apd on
            wow.pattern_id = apd.pattern_id
        left join im_prd_master_detail ipmd on apd.rm_det_id = ipmd.id 
        left join im_prd_master ipm on ipm.id = ipmd.prd_id
        where
            wow_no = '$wo'
            and apd.patt_cat_desc in ('PAKAN','PAKAN JHT') 
            group by ipmd.barcode,wow.wow_no, apd.no_urut,ipm.short_desc ");
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

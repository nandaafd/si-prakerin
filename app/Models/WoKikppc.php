<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class WoKikppc extends Model
{
    use HasFactory;

    public static function get()
    {
        $get_data = DB::connection('pgsql')
            ->select(
                "SELECT
                wow.wow_no as no_kik,
                wow.wow_date,
                SUBSTRING ( wow.kd_patrun, 8, 4 ) as kd_patrun,
                wow.kd_tmb,
                wow.LENGTH,
                wow.pattern_no as no_bukti,
                wow.pattern_id,
                a.prd_code, 
                apd.pattern_id, 
	            sum(apd.qty_helai) as jml_lusi,
                apd.patt_cat_desc
            FROM
                prod.work_order_weaving wow
                left join im_prd_master as a on prd_id = a.id
                left join prod.atm_pattern_detail apd on apd.pattern_id = wow.pattern_id
                where
                patt_cat_desc = 'LUSI'
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
                apd.pattern_id
            order by wow.wow_date asc"
            );
        return $get_data;
    }

    public function get_detail_wo()
    {
        $get_detail = DB::connection('pgsql')
            ->select("SELECT 
            wow.wow_no,
            apd.patt_cat_desc,
            apd.qty_helai,
            apd.no_urut
        from
            prod.work_order_weaving wow
        left join prod.atm_pattern_detail apd on
            wow.pattern_id = apd.pattern_id
        where apd.patt_cat_desc IN ('LUSI','PAKAN','PAKAN TPL')
        group by
            wow.wow_no,
            wow.wow_date,
            apd.no_urut,
            apd.qty_helai,
            wow.pattern_id,
            apd.patt_cat_desc
        order by
            wow.wow_date asc limit 300");
        return $get_detail;
    }
}

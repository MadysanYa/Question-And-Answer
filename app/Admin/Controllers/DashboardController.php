<?php

namespace App\Admin\Controllers;

use App\Models\Commune;
use App\Models\District;
use App\Models\PropertyResearch;
use Encore\Admin\Layout\Content;
use App\Models\PropertyAppraisal;
use App\Models\PropertyIndicator;
use Illuminate\Support\Facades\DB;
use Encore\Admin\Controllers\AdminController;

class DashboardController extends AdminController
{
    public function index(Content $content)
    {
        $allDistrictName = [
            'SenSok','7Makara','BoeungKengKang','Chamkarmon','ChbarAmpov',
            'ChroyChangvar','Dangkao', 'DaunPenh','Kamboul', 'Meanchey',
            'PorSenChey', 'PrekPnov', 'RusseyKeo', 'ToulKork'
        ];
        $countProReseach = PropertyResearch::GetWithCount();
        $countProIndicator = PropertyIndicator::GetWithCount();
        $countProAppraisal = PropertyAppraisal::GetWithCount();

        $khanSenSok = $this->formatDistrictCommune(1);
        $Khan7Makara = $this->formatDistrictCommune(2);
        $KhanBoeungKengKang = $this->formatDistrictCommune(3);
        $KhanChamkarmon = $this->formatDistrictCommune(4);
        $KhanChbarAmpov = $this->formatDistrictCommune(5);
        $KhanChroyChangvar = $this->formatDistrictCommune(6);
        $KhanDangkao = $this->formatDistrictCommune(7);
        $KhanDaunPenh = $this->formatDistrictCommune(8);
        $KhanKamboul = $this->formatDistrictCommune(9);
        $KhanMeanchey = $this->formatDistrictCommune(10);
        $KhanPorSenChey = $this->formatDistrictCommune(11);
        $KhanPrekPnov = $this->formatDistrictCommune(12);
        $KhanRusseyKeo = $this->formatDistrictCommune(13);
        $KhanToulKork = $this->formatDistrictCommune(14);

        $content->header('Dashboard');
        $content->body(view('admin.charts.property_price_bar_chart', [
            'countProReseach' => $countProReseach,
            'countProIndicator' => $countProIndicator,
            'countProAppraisal' => $countProAppraisal,
            'allDistrictName' => $allDistrictName,
            'khanSenSok' => $khanSenSok,
            'Khan7Makara' => $Khan7Makara,
            'KhanBoeungKengKang' => $KhanBoeungKengKang,
            'KhanChamkarmon' => $KhanChamkarmon,
            'KhanChbarAmpov' => $KhanChbarAmpov,
            'KhanChroyChangvar' => $KhanChroyChangvar,
            'KhanDangkao' => $KhanDangkao,
            'KhanDaunPenh' => $KhanDaunPenh,
            'KhanKamboul' => $KhanKamboul,
            'KhanMeanchey' => $KhanMeanchey,
            'KhanPorSenChey' => $KhanPorSenChey,
            'KhanPrekPnov' => $KhanPrekPnov,
            'KhanRusseyKeo' => $KhanRusseyKeo,
            'KhanToulKork' => $KhanToulKork
        ]));

        return $content;
    }

    public function formatDistrictCommune($districtId)
    {
        $districtName = District::where('id', $districtId)->limit(1)->value('district_name');
        $response = ['district' => 'Khan'.' '.$districtName, 'communes' => [], 'price' => []];
        $proKhan = DB::table('property_mat_view_summary')
                    ->select('commune_id', 'district_id', DB::raw('SUM(land_value_per_sqm) as total_price'))
                    ->where('district_id', $districtId)
                    ->groupBy('commune_id', 'district_id')
                    ->get()
                    ->toArray();

        if (is_array($proKhan) && !count($proKhan)) {
            $response['price'] = [0];
            $response['communes'] = [0];

            return $response;
        }

        foreach($proKhan as $value) {
            $response['price'] = array_merge($response['price'], [$value->total_price]);
            $response['communes'] = array_merge($response['communes'], [Commune::where('id', $value->commune_id)->limit(1)->value('commune_name')]);
        }

        return $response;
    }
}
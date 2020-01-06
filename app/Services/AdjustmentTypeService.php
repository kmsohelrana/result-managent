<?php
namespace App\Services;
use App\AdjustmentType;
use Auth;

class AdjustmentTypeService
{

    public static function updateOrCreate($data)
    {
        $user_id = Auth::user()->id;

        if(!empty($data["id"])){
            // update

            $adjustment_type = AdjustmentType::whereId($data["id"])->first();
            $adjustment_type->updated_by = $user_id;

        }else{
            //create

            $adjustment_type = new AdjustmentType();
            $adjustment_type->created_by = $user_id;
        }

        $adjustment_type->title = $data["title"];
        $adjustment_type->short_description = $data["short_description"];


        return $adjustment_type->save() ? $adjustment_type : null;
    }

    public static function lists($data)
    {
        $search_query = [];

        $item_per_page = !empty($data["item_per_page"]) ? $data["item_per_page"] : session()->get("settings.item_per_page", 25);
        $order = !empty($data["data_order"]) ? $data["data_order"] : session()->get('settings.data_order', 'desc');

        $query = AdjustmentType::query();

        if (auth()->user()->isAdmin() === false) {
            $query->whereUserId(auth()->user()->id);
        }

        if (isset($data["search"])) {

            $search_query = [
                "search" => $data["search"]
            ];

            $query->where(function ($q) use ($data) {
                $q->orWhere("title", "LIKE", "%" . $data["search"] . "%");
            });
        }

        $adjustment_types = $query->orderBy('id', $order)->paginate($item_per_page)->appends($search_query);

        return $adjustment_types;
    }

    public static function getById($id)
    {
        return AdjustmentType::whereId($id)->first();
    }

    public static function delete($adjustment_type)
    {
        $status = $adjustment_type->delete();
        return $status;
    }

    public static function getDropDownList()
    {
        $adjustment_type = AdjustmentType::pluck('title','id');
        array_add($adjustment_type, "", "-- Select One --");
        return $adjustment_type;
    }
}

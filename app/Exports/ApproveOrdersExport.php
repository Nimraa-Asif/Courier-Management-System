<?php

namespace App\Exports;


use App\Models\ApproveOrder;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ApproveOrdersExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ApproveOrder::all();
    }
    public function map($post): array
    {
        return [
            $post->Agent_Info_Id,
            $post->Added_by,
            $post->Tracking_id,
            $post->Sender_name,
            $post->Receiver_name,
            $post->Email,
            $post->Contact,
            $post->Weight_KG,
            $post->Price,
            $post->Receiver_city,
            $post->Delivery_charges,
            $post->Sender_address,
            $post->Receiver_address,
            $post->Order_date,
            $post->Total_price,
        ];
    }
    public function headings(): array
    {
        return [
            'Agent_Id',
            'Added_by',
            'Tracking_id',
            'Sender_Name',
            'Receiver_Name',
            'Email',
            'Contact',
            'Weight_KG',
            'Price',
            'Receiver_City',
            'Delivery_Charges',
            'Sender_Address',
            'Receiver_Address',
            'Order_Date',
            'Total_Price'
        ];
    }
}

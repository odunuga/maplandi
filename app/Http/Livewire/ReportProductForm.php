<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Shop\Entities\Product;
use Modules\Shop\Entities\ProductReport;

class ReportProductForm extends Component
{
    public $reporter_message;
    public $reported_product;

    protected $listeners = ['show_form' => 'prepare_form'];

    public function prepare_form($id)
    {
        if ($id) {
            $check_item = Product::where('sku', $id);
            if ($check_item->count() > 0) {
                $item = $check_item->first();
                $this->reported_product = $item;
            }
        }
    }

    public function sendReportProductForm()
    {
        if ($this->reported_product) {

            ProductReport::create([
                'user_id' => auth()->id(),
                'product_id' => $this->reported_product['id'],
                'comments' => $this->reporter_message
            ]);
        }
        $this->emit('alert', ['success', __('texts.product_report_success')]);
        $this->emit('hide_report_product_modal');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.report-product-form');
    }
}

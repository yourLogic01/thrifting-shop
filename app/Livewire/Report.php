<?php

namespace App\Livewire;

use App\Models\Purchase;
use App\Models\Sale;
use Livewire\Component;

class Report extends Component
{
    public $start_date;
    public $end_date;
    public $total_sales, $sales_amount;
    public $total_purchases, $purchases_amount;
    public $profit_amount;
    public $total_transaction;

    protected $rules = [
        'start_date' => 'required|date|before:end_date',
        'end_date'   => 'required|date|after:start_date'
    ];

    public function mount()
    {
        $this->start_date = '';
        $this->end_date = '';
        $this->total_sales = 0;
        $this->sales_amount = 0;
        $this->total_purchases = 0;
        $this->purchases_amount = 0;
        $this->total_transaction = 0;
    }

    public function render()
    {
        $this->setValues();

        return view('livewire.report');
    }

    public function generateReport()
    {
        $this->validate();
    }

    public function setValues()
    {
        // Count Total Sales
        $this->total_sales = Sale::completed()
            ->when($this->start_date, function ($query) {
                return $query->whereDate('date', '>=', $this->start_date);
            })
            ->when($this->end_date, function ($query) {
                return $query->whereDate('date', '<=', $this->end_date);
            })
            ->count();

        // Sales Amount
        $this->sales_amount = Sale::completed()
            ->when($this->start_date, function ($query) {
                return $query->whereDate('date', '>=', $this->start_date);
            })
            ->when($this->end_date, function ($query) {
                return $query->whereDate('date', '<=', $this->end_date);
            })
            ->sum('total_amount') / 100;

        // Count Total Purchases
        $this->total_purchases = Purchase::completed()
            ->when($this->start_date, function ($query) {
                return $query->whereDate('date', '>=', $this->start_date);
            })
            ->when($this->end_date, function ($query) {
                return $query->whereDate('date', '<=', $this->end_date);
            })
            ->count();

        // Purchases Amount
        $this->purchases_amount = Purchase::completed()
            ->when($this->start_date, function ($query) {
                return $query->whereDate('date', '>=', $this->start_date);
            })
            ->when($this->end_date, function ($query) {
                return $query->whereDate('date', '<=', $this->end_date);
            })
            ->sum('total_amount') / 100;

        $this->profit_amount = $this->calculateProfit();
        $this->total_transaction = $this->getTransactions();
    }

    public function calculateProfit()
    {
        $product_costs = 0;
        $revenue = $this->sales_amount;

        $sales = Sale::completed()
            ->when($this->start_date, function ($query) {
                return $query->whereDate('date', '>=', $this->start_date);
            })
            ->when($this->end_date, function ($query) {
                return $query->whereDate('date', '<=', $this->end_date);
            })
            ->with('saleDetails')->get();

        foreach ($sales as $sale) {
            foreach ($sale->saleDetails as $saleDetail) {
                $product_costs += $saleDetail->product->product_cost * $saleDetail->quantity;
            }
        }

        $profit = $revenue - $product_costs;

        return $profit;
    }

    public function getTransactions()
    {
        $total_sales = Sale::completed()
            ->when($this->start_date, function ($query) {
                return $query->whereDate('date', '>=', $this->start_date);
            })
            ->when($this->end_date, function ($query) {
                return $query->whereDate('date', '<=', $this->end_date);
            })
            ->count();

        $total_purchases = Purchase::completed()
            ->when($this->start_date, function ($query) {
                return $query->whereDate('date', '>=', $this->start_date);
            })
            ->when($this->end_date, function ($query) {
                return $query->whereDate('date', '<=', $this->end_date);
            })
            ->count();

        return $total_sales + $total_purchases;
    }
}

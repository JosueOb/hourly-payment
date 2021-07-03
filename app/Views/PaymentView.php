<?php

namespace App\Views;

class PaymentView
{
    public array $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function show()
    {
        foreach ($this->data as $data) {
            echo "The amount to pay {$data["user"]} is: {$data["total"]} USD\n";
        }
    }
}

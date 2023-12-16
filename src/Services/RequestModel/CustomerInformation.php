<?php

namespace Mkeremcansev\IsyerimPos\Services\RequestModel;

class CustomerInformation
{
    public string $name;

    public string $surname;

    public string $phone;

    public string $email;

    public string $address;

    public string $description;

    public function setCustomerInformation($name, $surname, $phone, $email, $address, $description): self
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->phone = $phone;
        $this->email = $email;
        $this->address = $address;
        $this->description = $description;

        return $this;
    }

    public function getCustomerInformation(): array
    {
        return [
            'Name' => $this->name,
            'Surname' => $this->surname,
            'Phone' => $this->phone,
            'Email' => $this->email,
            'Address' => $this->address,
            'Description' => $this->description,
        ];
    }
}

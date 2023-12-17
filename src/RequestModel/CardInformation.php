<?php

namespace Mkeremcansev\IsyerimPos\RequestModel;

class CardInformation
{
    public string $cardOwner;

    public string $cardNo;

    public string $month;

    public string $year;

    public string $cvv;

    public function setCardInformation($cardOwner, $cardNo, $month, $year, $cvv): self
    {
        $this->cardOwner = $cardOwner;
        $this->cardNo = $cardNo;
        $this->month = $month;
        $this->year = $year;
        $this->cvv = $cvv;

        return $this;
    }

    public function getCardInformation(): array
    {
        return [
            'CardOwner' => $this->cardOwner,
            'CardNo' => $this->cardNo,
            'Month' => $this->month,
            'Year' => $this->year,
            'Cvv' => $this->cvv,
        ];
    }

    public function getCardNo(): string
    {
        return $this->cardNo;
    }
}

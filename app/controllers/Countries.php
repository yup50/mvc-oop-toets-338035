<?php

class Countries extends BaseController
{
    private $countryModel;

    public function __construct()
    {
        $this->countryModel = $this->model('Country');
    }

    public function index()
    {
        $countries = $this->countryModel->getCountries();

        $dataRows = "";

        foreach ($countries as $country) {
            $dataRows .= "<tr>
                            <td>{$country->Naam}</td>
                            <td>" . number_format($country->NettoWaarde, 0, ",", ".") . "</td>
                            <td>{$country->Land}</td>
                            <td>{$country->Mobiel}</td>   
                            <td>" . number_format($country->Leeftijd, 0, ",", ".") . "</td>         
                        </tr>";
        }

        $data = [
            'title' => 'Landen van de Wereld',
            'dataRows' => $dataRows
        ];

        $this->view('countries/index', $data);
    }

    /**
     * Creates a new country.
     *
     * This method is responsible for rendering the create view and passing the necessary data to it.
     *
     * @return void
     */
    public function create()
    {
        $data = [
            'title' => 'Nieuw land toevoegen'
        ];

        $this->view('countries/create', $data);
    }
}
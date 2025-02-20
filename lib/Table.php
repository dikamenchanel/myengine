<?php

namespace lib;


use controller\Admin\AdminController;

class Table
{
    public $titles  = [];
    public $data    = [];
    public $style   = [];
    public $filters = [];

    public function generateTable($SQLData)
    {   
        if(!empty($SQLData))
        {
            $this->titles = array_keys($SQLData[0]);

            foreach($SQLData as $key => $value)
            {
                $this->data[$key] = array_values($value);
            }
        }
        return false;
    }

    public function addFilter($filter)
    {
        $this->filters[] = $filters;
    }


    public function addStyle($style)
    {
        $this->style = $style;
    }


    public function addAction($url)
    {
        if(!empty($this->data))
        {
            $this->titles[] = 'actions';
            foreach( $this->data as $key => $value)
            {
                $this->data[$key]['urlAction'][] = "$url/edit/$value[0]";
                $this->data[$key]['urlAction'][] = "$url/delete/$value[0]";
            }
        }
        return false;
    }

    public function addLink($index, $inner='')
    {
        if(!empty($this->data))
        {
            $this->titles[] = 'link';
            foreach( $this->data as $key => $value)
            {
                $this->data[$key]['urlLink']['href']      = $this->data[$key][$index];
                $this->data[$key]['urlLink']['innerHTML'] = $inner;
            }
        }
        return false;
    }

    public function addAvatar($index, $style='')
    {
        if(!empty($this->data))
        {
            $this->titles[] = 'avatar';
            foreach( $this->data as $key => $value)
            {
                $this->data[$key]['urlAvatar']['src']   = $this->data[$key][$index];
                $this->data[$key]['urlAvatar']['style'] = $style;
            }
        }
        return false;
    }
    public function changeDataRow($numRow, $dat1, $dat2)
    {
        if(!empty($this->data))
        {
            foreach( $this->data as $key => $value)
            {
                if($value[$numRow] == $dat1[0])
                {
                    $value[$numRow] = $dat1[1];
                }
                if($value[$numRow] == $dat2[0])
                {
                    $value[$numRow] = $dat2[1];
                }

                $this->data[$key]  = $value;
            }
        }
        return false;
    }

    public function addInput($name, $numRow=0)
    {
        if(!empty($this->data))
        {
            foreach($this->data as $key => $value)
            {
                $this->data[$key]['urlAction']['input']['name']    = $name;
                $this->data[$key]['urlAction']['input']['checked'] = (intval($this->data[$key][$numRow]) > 0) ? true : false;
            }
        }
        return false;
    }

}

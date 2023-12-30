<?php


namespace lib;


class Form
{
    public $action;
    public $form;
    public $status;
    public $error;


    function addSelect($name, $option=[], $label='', $selected = 0, $id='', $class='')
    {
        if(empty($id))
        {
            $id = $name;
        }
        $option[] = [0, ' -- Default -- '];
        $select = array(
            'label'   => $label,
            'error'   => false,
            'errorMsg'=> '',
            'tag'     => 'select',
            'name'    => $name,
            'id'      => $id,
            'option'  => $option,
            'selected'=> $selected
        ); 

        $this->form[] = $select;
    }

    function addInput($name, $value='', $type='text', $label='', $id='', $class='', $params=[])
    {
        if(empty($id))
        {
            $id = $name;
        }

        if(empty($class))
        {
            $class = $name;
        }

        $input = array_merge(array(
            'label'   => $label,
            'error'   => false,
            'errorMsg'=> '',
            'tag'     => 'input',
            'name'    => $name,
            'type'    => $type,
            'value'   => $value,
            'id'      => $id,
            'class'   => $class
        ), $params); 

        $this->form[] = $input;
    }


    function addSubmit($value='', $class='', $id='',  $params=[])
    {
        if(empty($id))
        {
            $id = $class;
        }

        $button = array_merge(array(
            'tag'    => 'button',
            'value'  => $value,
            'id'     => $id,
            'class'  => $class
        ), $params); 

        $this->form[] = $button;
    }

    function addTextarea($name, $value='', $label='', $cols=30, $rows=8, $id='', $class='')
    {
        if(empty($id))
        {
            $id = $name;
        }

        if(empty($class))
        {
            $class = $name;
        }

        $textarea = array(
            'label'   => $label,
            'error'   => false,
            'errorMsg'=> '',
            'tag'     => 'textarea',
            'name'    => $name,
            'value'   => $value,
            'id'      => $id,
            'class'   => $class,
            'cols'    => $cols,
            'rows'    => $rows
        );

        $this->form[] = $textarea;
    }

    function addTinymce($name, $value='', $label='', $id='', $class='')
    {
        if(empty($id))
        {
            $id = $name;
        }

        if(empty($class))
        {
            $class = $name;
        }

        $div = array(
            'label'    => $label,
            'error'    => false,
            'errorMsg' => '',
            'tag'      => 'tinymce',
            'name'     => $name,
            'value'    => $value,
            'id'       => $id,
            'class'    => $class
        );

        $this->form[] = $div ;
    }

    function formError($Array)
    {
        if(gettype($Array) == 'string' )
        {
            $this->error = $Array;
        }else{
            foreach($this->form as $key => $value)
            {
                foreach($Array as $i => $item)
                {
                    if((isset($value['name']) and isset($value['error'])) and $value['name'] == $item[0])
                    {
                        $value['error'] = true;
                        $value['errorMsg'] = $item[1];
                        $this->form[$key] = $value;
                        break;
                    }
                }
            }
        }

        return $this->form;
    }


    function getData()
    {        
        return $this->form;
    }

}

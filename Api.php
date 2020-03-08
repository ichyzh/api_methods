<?php

class API
{
    public function getAll(string $file) :string
    {
        $header = [];
        $data = array();
        if (($handle = fopen($file, 'r')) !== false)
        {
            while (($row = fgetcsv($handle, 1000, ',')) !== false)
            {
                if(empty($header))
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }

        return json_encode($data);
    }

    public function getByModel(string $file, string $needle) :string
    {
        $data = json_decode($this->getAll($file), true);

        $items = [];
        foreach ($data as $k=>$v) 
        {
            if (stripos($data[$k]['Zaneen Model #'], $needle) !== false) {
                $items[] = $data[$k];
            }
        }

        return json_encode($items);
    }
}

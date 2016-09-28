<?php

namespace App\Model;

class BaseEntity
{
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @param array $data
     */
    public function hydrate(array $data = array())
    {
        foreach ($data as $key => $value) {
            if (in_array($key, $this->guarded)) {
                continue;
            }

            if (method_exists($this, $this->generateSetter($key))) {
                call_user_func(array($this, $this->generateSetter($key), $value));
            }
        }
    }

    /**
     * @param $name
     * @return string
     */
    protected function generateSetter($name)
    {
        return 'set' . ucfirst($name);
    }
}
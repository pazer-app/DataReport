<?php declare(strict_types=1);
namespace PazerApp\DataReport;
class DataReport {
    protected array $_data;
    protected array $_sets;
    protected array $_info;
    public function __construct() { return $this->clear(); }
    public function clear() : self { $this->_info = array( "code" => 0 ); $this->_sets = array(); $this->_data = array(); return $this; }
    public function setCode(int $code) : self { $this->_info['code'] = $code; return $this; }
    public function setMessage(string $message) : self { $this->_info['message'] = $message; return $this; }
    public function setData(array $data) : self { $this->_data = $data; return $this; }
    protected function _setSets(string $name, $value) : self { $this->_sets["set_".$name] = $value; return $this; }
    public function setSetsString(string $name, string $value) : self { return $this->_setSets($name, $value); }
    public function setSetsInt(string $name, int $value) : self { return $this->_setSets($name, $value); }
    public function setSetsFloat(string $name, float $value) : self { return $this->_setSets($name, $value); }
    public function setSetsArray(string $name, array $value) : self { return $this->_setSets($name, $value); }
    public function setSetsBool(string $name, bool $value) : self { return $this->_setSets($name, $value); }
    public function getCode() : int { return $this->_info['code']; }
    public function getMessage() : string { return $this->_info['message']; }
    public function getData() : array { return $this->_data; }
    protected function _getSets(string $name) { return $this->_sets["set_".$name] ?? null; }
    public function getSetsString(string $name) : ?string { return $this->_getSets($name) ?? null; }
    public function getSetsInt(string $name) : ?int { return $this->_getSets($name) ?? null; }
    public function getSetsFloat(string $name) : ?float { return $this->_getSets($name) ?? null; }
    public function getSetsArray(string $name) : ?array { return $this->_getSets($name) ?? null; }
    public function getSetsBool(string $name) : ?bool { return $this->_getSets($name) ?? null; }
    public function outArray() : array {$result = $this->_info; $result['data'] = $this->_data; return array_merge($result, $this->_sets);}
    public function outJSON() : string { return json_encode($this->outArray(), JSON_UNESCAPED_UNICODE); }
}

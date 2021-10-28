<?php

namespace FacturaScripts\Plugins\Cpagos\Model;

use FacturaScripts\Core\Model\Base;
use FacturaScripts\Core\Base\DataBase\DataBaseWhere;
use FacturaScripts\Dinamic\Model\ContraLinea;

class Cpago extends Base\ModelClass{
   use Base\ModelTrait;
   
   public $creationdate;
   public $idcpago;
   public $linestotal;
   public $user;
   public $idfactura;
   public $supplier;
   public $codproveedor;
   public $numproveedor;
   public $paymentdate;
   public $totalcontra;
       
   public function clear() {
       parent::clear();
       $this->creationdate = date('d-m-y');
       $this->paymentdate = date("Y-m-d", strtotime($this->creationdate . "+ 1 month"));
       $this->verified=false;
   }

   //devuelve un array con las lineas de la contraseña
   public function getLines(): array
   {
    $line = new ContraLinea();
    $where = [new DataBaseWhere("idfacturaprov", $this->id)];
    return $line->all($where);
   }

   public static function primaryColumn(): string {
        return 'idcpago';
    }

    public static function tableName(): string {
        return 'cpagos';
    }  
    

}

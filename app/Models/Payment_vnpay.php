<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment_vnpay extends Model
{
    use HasFactory;
    protected $table = 'payment_vnpay';
    protected $fillable = ['id',"vnp_Amount","vnp_BankCode","vnp_BankTranNo","vnp_CardType", "vnp_OrderInfo","vnp_PayDate","vnp_ResponseCode","vnp_TransactionNo","vnp_TmnCode" ,"vnp_TransactionStatus", "vnp_TxnRef","vnp_SecureHash",'created_at', 'updated_at'];
}

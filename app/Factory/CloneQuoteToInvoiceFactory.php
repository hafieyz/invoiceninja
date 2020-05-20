<?php
/**
 * Invoice Ninja (https://invoiceninja.com)
 *
 * @link https://github.com/invoiceninja/invoiceninja source repository
 *
 * @copyright Copyright (c) 2020. Invoice Ninja LLC (https://invoiceninja.com)
 *
 * @license https://opensource.org/licenses/AAL
 */

namespace App\Factory;

use App\Models\Invoice;
use App\Models\Quote;

class CloneQuoteToInvoiceFactory
{
    public static function create(Quote $quote, $user_id) : ?Invoice
    {

      $invoice = new Invoice();

      $quote_array = $quote->toArray();

      unset($quote_array['client']);
      unset($quote_array['company']);
      unset($quote_array['hashed_id']);
      unset($quote_array['invoice_id']);
      unset($quote_array['id']);
      
      foreach($quote_array as $key => $value)
			   $invoice->{$key} = $value;
   		
   		$invoice->due_date = null;
   		$invoice->partial_due_date = null;
      $invoice->number = null;
      $invoice->status_id = null;

      return $invoice;

    }
}

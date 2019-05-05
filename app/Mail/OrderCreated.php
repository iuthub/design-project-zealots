<?php

namespace BrandShop\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use BrandShop\Order;

class OrderCreated extends Mailable
{
	use Queueable, SerializesModels;


	public $order;
	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct(Order $order)
	{
		$this->order = $order;

	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build()
	{
		return $this->from("admin@brandshop.us")->view('emails.order.created');
	}
}

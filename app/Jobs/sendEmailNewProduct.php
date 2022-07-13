<?php

namespace App\Jobs;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class sendEmailNewProduct implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $product;
    protected $store;
    protected $email;
     
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Product $product, Store $store)
    {
        $this->product = $product;
        $this->store = $store;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Mail::to($this->email)->send(new \App\Mail\NewProductCreated()); 
        $this->mail->subject('Novo produto adicionado a loja '.$this->product->name);
        Mail::to($this->store->email, $this->store->name);
        Mail::send(new \App\Mail\NewProductCreated()); 
    }
}

Firstly i will like to say, i will be modifying this later on to move the flutterwave folder to App\Libraries folder.

To use this you i current have Transfer, VirtualCards & Bills instatiate in this copy. To add others just go to app/config/Services.php and add the new functions you will love to make use of
you can then goto app/Controllers/BaseController.php and make the function available for all your Controllers by following the current examples in the file.

$this->card = \Config\Services::virtualcards(); // Be sure to have add this in the app/Config/Services.php (I Plan to add all soon).

then to use them in your controller you can make use of $this->card this will automatically call the virtualcards class from the flutterwave library

example usage in your controller.

``` 
      $this->card->listCards(); 
      $this->transfer->listTransfers();
```
for further help you can reach me via my 
E-mail: hi@towoju.com
Skype:  towojuads_1


I will be uploading a copy of CodeIgniter Cart(cart migration from CI 3) soon.

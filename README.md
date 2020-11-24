### Dynamic Multi Input Livewire / Clone Form
***
#### Key Features
* Multi-Input / Form Clone
* SweetAlert delete function with confirmation
* Edit within the form
* Store to database with real-time validation
* SweetAlert Toast used in Store & Update

***
###Documentation
Now let's see how each function will work.
***
##### `destroy() Function` // FaqComponent.php
***
Firstly we need to create delete function where a simple query will run to get the id from database and delete the record. This is what we do in controller all the time.
~~~php
public function destroy($id)
    {
        $faqById = Faq::query()->findOrFail($id);
        $faqById->delete();
    }
~~~

***
##### `showConfirmation() Function` // FaqComponent.php
***
Need another function to trigger sweetalert confirmation via Livewire Event
~~~php
public function showConfirmation($id)
    {
        Faq::query()->findOrFail($id);
        $this->dispatchBrowserEvent('modal', ['id' => $id]);
    }
~~~
This piece of code will fire the browser window events. Now we need to listen to this [event](https://laravel-livewire.com/docs/2.x/events).
~~~php
$this->dispatchBrowserEvent('modal', ['id' => $id]);
~~~
Listen for this window [event](https://laravel-livewire.com/docs/2.x/events) with JavaScript.
~~~javascript
window.addEventListener('modal', function(e){
        // your sweetalert functions
    });
~~~

***
##### `wire:click` Action // table-view.blade.php
***
Livewire has their own syntax for [Actions](https://laravel-livewire.com/docs/2.x/actions) with the elements, but the concept is same as vue. With `wire:click` i'm calling this `showConfirmation({{ $faq->id }})` function along with id from livewire component.
~~~blade
<a
   wire:click="showConfirmation({{ $faq->id }})"
   type="button"
   class="btn btn-danger"
   style="margin: 5px;"
>Delete</a>
~~~

***
##### `Listen & Emit/Fire event from JavaScript` // FaqComponent.php
***

Now we have to declare property for the [Listener](https://laravel-livewire.com/docs/2.x/events). Listeners are `key -> value` pair. When we fire an event we listen to a particular key where the value will return the result.
~~~php
protected $listeners = ['deleteConfirmed' => 'destroy'];
~~~

In javaScript we can fire an event with this piece of code. To be honest with you this code is not mentioned in docs nor i found in google, you will find `Livewire.on` or `@this.on('foo', () => {})` but i don't know why but for some reason i was facing errors. Luckily this one worked for me. Simply write this code before confirmation logic and this will fire event and listen to the key from backend. That's it ...
~~~javascript
Livewire.emit('deleteConfirmed', e.detail.id);
~~~

###### alert.blade.php
~~~javascript
window.addEventListener('modal', function(e){
        Swal.fire({
            title: "Are you sure ?",
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
        })
            .then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('deleteConfirmed', e.detail.id);
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })
    });
~~~

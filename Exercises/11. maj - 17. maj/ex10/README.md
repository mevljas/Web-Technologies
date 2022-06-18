# Assignment 1: AJAX Bookstore
Implement **AJAX** for **purging cart contents** and **changing cart item quantities**.
On the client side, add jQuery event listeners (file view/cart-contents.php)  
1) one that purges all items from the cart,
2) another that updates the quantity of the chosen item.  
  
On the server side, add appropriate controllers that will handle these AJAX calls (file
controller/StoreController.php)  
The server should return **an HTML snippet** that you later insert into DOM using
JavaScript.  
**Hints**  
- Check how cart additions are implemented.
- You may use AJAX shorthand methods, like $.post or $.get.
https://api.jquery.com/jquery.post
- For updating the quantities, use the change event listener.
https://api.jquery.com/change/


# Assignment 2: AJAX Book search
- Implement client code for **AJAX book search** that
sends **GET** requests to
 **http://localhost/ex10/api/book/search?query=X**
to search for books with query string **X**.
- Use JavaScript for sending requests and display
the results inside the
**<ul class="book-hits"></ul>** block.
(file view/book-search-ajax.php)  
Hint: If you want the listener to get invoked for
every keystroke, even for backspace and delete,
use the **keyup** event listener:
https://api.jquery.com/keyup


# Assignment 3: Vue Book search
- Compare the Vue book search implementation
against the solution of Assignment 2
- Vue resources:
    - https://vuejs.org
    - Guide: https://vuejs.org/v2/guide
    - Laracasts tutorial:
https://laracasts.com/series/learn-vue-2-step-by-ste
p

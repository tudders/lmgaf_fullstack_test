# lmgaf_fullstack_test
 lmgaf_fullstack_test

 ## Running the app
 + The app runs on http://127.0.0.1:8000
 + In a terminal window navigate to the repo folder and type _php artisan serve_
 + In another terminal navigate to the same folder and type _npm run dev_
 + View the site in the browser at http://127.0.0.1:8000


## Architecture summary
+ Front end - Vue3
+ Backend - Laravel
+ Overarching framework - InertiaJS
+ Database - Azure SQL
+ CSS - Tailwind

## Development considerations
+ Build a Twitter clone, with basic functionality.
+ Considerations:
     - How close to Twitter styling? Decision - quite close.
     - Add more functionality beyond the scope, e.g. a proper sidenav, mock pages? Decision - no.
     - Should I use the Laravel way of managing DBs? Decision - no. An unknown dev situation for me.
     - Do I put a time limit on my work? Decision yes - no more than '1 day' of work. Let's see where I get to. (In the end it was about 6 hours of work)
     - Extensive commenting? Decision - No - a simple app, pretty self-explanatory & I would apply the standards are set in the workplace to work code.
     - Given I've not used Laravel, IntertiaJS, or Tailwind extensively before - keep things relatively simple.  

## Development approach
1. On paper draw the application structure - all the pieces, split into pages amd components, and auth boundaries.
2. build all the pages in Vue, Laravel routes. 
3. One by one build (un-styled) pages that post - model, controller logic, database, and input elements.
4. Build auth into the backend (login page).
5. Set up auth guards (only on the main page in this app).
6. Apply styling.
7. Review, and test. 

## Extending the app beyond what's currently here.
+ Add modal sign-in.
+ Add more assets to the app.
+ Proper validation warnings around the CREATE and LOGIN - app currently doesn't warn user if their password is wrong, email is in use,...
+ Proper auth flow, e.g. reset password. sign-in with google etc ..., 2FA, one-time codes.
+ Expanded user section - user details, settings.
+ dark mode
+ search for posts
+ Add more functionality around posting - post to self only, to groups, to everyone, limit post size, 
+ Add more functionality to the posts - forward ...
+ ... one option is to keep going until it's basically a twitter clone proper.

## Testing approach - there is no testing in this app, but the approach would be something like this.
+ Can load home page.
+ Can load create user page
+ Can create user - (auto logged in)
+ Newly created user can log in.
+ Can log out - redirect to home page
+ Can load login page.
+ User can login - loads main page.
+ Newly created user can post
+ Newly created user can delete post 

Next level

+ check the pages for correct assets, positioning, data.


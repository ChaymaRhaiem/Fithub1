# Fithub1
## Event Module
##### This module provides functionality for managing events, booking tickets, and accessing the backoffice for event administrators.

### Installation
Clone the repository.
Run composer install to install dependencies.
Configure your database connection in the .env file.
Run php bin/console doctrine:migrations:migrate to create the database schema.
### Usage
#### Viewing Events
To view a list of events, navigate to the home page. Click on an event to view more details, including available tickets and a booking form.

#### Booking Tickets
To book a ticket for an event, fill out the booking form on the event details page. You will need to provide your name and email address. After submitting the form, you will receive a confirmation message.

### Accessing the Backoffice
To access the backoffice, navigate to /eventadmin . You will need to log in with an administrator account. From the backoffice, you can view a list of all events, add new events, and manage existing events, including adding and deleting tickets.

# Magento version 2.4.3

# Requirement
The following example is the implementation of a tracking client in a Magento 2 backend. Its goal is to store the following, each time a product was added to customer's cart. For guests, just make the customer_id field null. Create  CRUD via REST API

Use Message queues to store the data. Whenever a customer adds a product to the cart, we should publish the data to be stored in Queue and consume the data from the queue, then store the data in the custom table. We should have logging wherever necessary to identify any issues in the process.

# Solution approach
Create a new table using Declarative schema and whitelist using the command
  php bin/magento setup:db-declaration:generate-whitelist --module-name=Assessment_Task
  php bin/magento s:up

Store the data using with observer and event while add the product to the cart.

Create a crud operation using with model, resource and collection. Assign api route in webapi.xml. 

For Message Queue, created communication.xml,queue.xml,queue_publisher.xml,queue_topology.xml and config publisher and consumer file.
Run the command for start the queue.
bin/magento queue:consumers:start assessmenttask.consumer





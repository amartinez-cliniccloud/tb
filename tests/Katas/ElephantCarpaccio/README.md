# Elephant Carpaccio
## The product that we want to develop

Product is a retail calculator that can accept 3 inputs:

* How many items
* Price per item
* 2-letter state code (for taxes)

Output is total price. Discount rate is applied based on order value. Taxes are applied based on state code on
discounted price. To clarify: we apply the discount first, and then, we apply the taxes.

Discounts:

| Order value | Discount rate |
|:------------|:-------------:|
| $1,000      |      3%       |
| $5,000      |      5%       |
| $7,000      |      7%       |
| $10,000     |      10%      |
| $50,000     |      15%      |

Taxes:

| State | Tax rate |
|-------|----------|
| UT    | 6.85%    |
| NV    | 8.00%    |
| TX    | 6.25%    |
| AL    | 4.00%    |
| CA    | 8.25%    |

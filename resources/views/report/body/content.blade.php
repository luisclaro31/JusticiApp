@extends('report.layout')
    @section('content')
        <table>
            <thead>
            <tr>
                <th class="service">SERVICE</th>
                <th class="desc">DESCRIPTION</th>
                <th>PRICE</th>
                <th>QTY</th>
                <th>TOTAL</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="service">Design</td>
                <td class="desc">Creating a recognizable design solution based on the company's existing visual identity</td>
                <td class="unit">$40.00</td>
                <td class="qty">26</td>
                <td class="total">$1,040.00</td>
            </tr>
            <tr>
                <td class="service">Development</td>
                <td class="desc">Developing a Content Management System-based Website</td>
                <td class="unit">$40.00</td>
                <td class="qty">80</td>
                <td class="total">$3,200.00</td>
            </tr>
            <tr>
                <td class="service">SEO</td>
                <td class="desc">Optimize the site for search engines (SEO)</td>
                <td class="unit">$40.00</td>
                <td class="qty">20</td>
                <td class="total">$800.00</td>
            </tr>
            <tr>
                <td class="service">Training</td>
                <td class="desc">Initial training sessions for staff responsible for uploading web content</td>
                <td class="unit">$40.00</td>
                <td class="qty">4</td>
                <td class="total">$160.00</td>
            </tr>
            <tr>
                <td colspan="4">SUBTOTAL</td>
                <td class="total">$5,200.00</td>
            </tr>
            <tr>
                <td colspan="4">TAX 25%</td>
                <td class="total">$1,300.00</td>
            </tr>
            <tr>
                <td colspan="4" class="grand total">GRAND TOTAL</td>
                <td class="grand total">$6,500.00</td>
            </tr>
            </tbody>
        </table>
        <div id="notices">
            <div>NOTICE:</div>
            <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
        </div>
    @endsection
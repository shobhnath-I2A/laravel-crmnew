@extends('layouts.app')
@section('content')
<div class=wrapper>
    <div class=container-fluid>
        <div class=main-content>
            <div class=page-content>
                <div class=newboxheading>
                    <div class=newhead> Today's Attandance Report
                        <div class=newoptionmenu>
                            <form action="" enctype=multipart/form-data>
                                <table border=0 cellpadding=0 cellspacing=0>
                                    <tbody>
                                        <tr>
                                            <td><select name=attandancedays class=form-control style=width:220px>
                                                    <option value=1 selected>Today's Attandance</option>
                                                    <option value=2>Last 7 Days Attandance</option>
                                                    <option value=3>This Month Attandance</option>
                                                    <option value=4>Last Month Attandance</option>
                                                </select></td>
                                            <td style=padding-left:5px><select name=searchusers class=form-control
                                                    style=width:180px>
                                                    <option value="">All Users</option>
                                                    <option value=4074>Adarsh Ojha</option>
                                                    <option value=4069>Akash Shrestha</option>
                                                    <option value=4068>Alok Kumar</option>
                                                    <option value=4047>Anjali A</option>
                                                    <option value=4072>Anjana Thakur</option>
                                                    <option value=1>i2a Technologies</option>
                                                    <option value=4075>Jennifer Chanu</option>
                                                    <option value=4071>Khushi Gupta</option>
                                                    <option value=4076>MIS i2a</option>
                                                    <option value=4013>Sachin Kumar</option>
                                                    <option value=4050>Sunil S</option>
                                                    <option value=4018>umesh singh</option>
                                                    <option value=4080>vidur vs</option>
                                                    <option value=4077>Vinay singh</option>
                                                </select></td>
                                            <td style=padding-left:5px><button type=submit
                                                    class="btn btn-secondary btn-lg waves-effect waves-light"
                                                    style="padding:6px 10px"><i class="fa fa-search" aria-hidden=true></i>
                                                    Search</button></td>
                                            <td style=padding-left:5px><a href="display.html?ga=attandancesreport">
                                                    <button type=button
                                                        class="btn btn-secondary btn-lg waves-effect waves-light"
                                                        style="padding:6px 10px">Reset</button>
                                                </a></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <input name=page type=hidden><input name=ga type=hidden value=attandancesreport>
                            </form>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="col-md-12 col-xl-12" style=padding-top:34px>
                        <div class=card style=min-height:500px>
                            <div class=card-body style=padding:0>
                                <table border=1 bordercolor=#CCCCCC class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th colspan=7 align=left bgcolor=#F5F5F5>Tuesday, 29 September 2026</th>
                                        </tr>
                                        <tr>
                                            <th width=2%>
                                                <div align=center>Sr.</div>
                                            </th>
                                            <th width=20%><strong>Name</strong></th>
                                            <th width=12%>
                                                <div align=center>First&nbsp;Login&nbsp;Time</div>
                                            </th>
                                            <th width=12%>
                                                <div align=center>Sessions</div>
                                            </th>
                                            <th width=12%>
                                                <div align=center>Last&nbsp;Update </div>
                                            </th>
                                            <th width=12%>
                                                <div align=center>Type</div>
                                            </th>
                                            <th width=12%>
                                                <div align=center>Working Hours </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td width=2% align=left valign=top>
                                                <div align=center>1</div>
                                            </td>
                                            <td width=20% align=left valign=top><strong>Adarsh Ojha</strong> </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>
                                                    -</div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>0</div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>
                                                    -</div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>
                                                    <span class="badge badge-danger">Absent</span>
                                                </div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>00:00</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width=2% align=left valign=top>
                                                <div align=center>2</div>
                                            </td>
                                            <td width=20% align=left valign=top><strong>Akash Shrestha</strong> </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>
                                                    -</div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>0</div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>
                                                    -</div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>
                                                    <span class="badge badge-danger">Absent</span>
                                                </div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>00:00</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width=2% align=left valign=top>
                                                <div align=center>3</div>
                                            </td>
                                            <td width=20% align=left valign=top><strong>Alok Kumar</strong> </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>
                                                    -</div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>0</div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>
                                                    -</div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>
                                                    <span class="badge badge-danger">Absent</span>
                                                </div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>00:00</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width=2% align=left valign=top>
                                                <div align=center>4</div>
                                            </td>
                                            <td width=20% align=left valign=top><strong>Anjali A</strong> </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>
                                                    -</div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>0</div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>
                                                    -</div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>
                                                    <span class="badge badge-danger">Absent</span>
                                                </div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>00:00</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width=2% align=left valign=top>
                                                <div align=center>5</div>
                                            </td>
                                            <td width=20% align=left valign=top><strong>Anjana Thakur</strong> </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>
                                                    -</div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>0</div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>
                                                    -</div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>
                                                    <span class="badge badge-danger">Absent</span>
                                                </div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>00:00</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width=2% align=left valign=top>
                                                <div align=center>6</div>
                                            </td>
                                            <td width=20% align=left valign=top><strong>i2a Technologies</strong> </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>
                                                    -</div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>0</div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>
                                                    -</div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>
                                                    <span class="badge badge-danger">Absent</span>
                                                </div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>00:00</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width=2% align=left valign=top>
                                                <div align=center>7</div>
                                            </td>
                                            <td width=20% align=left valign=top><strong>Jennifer Chanu</strong> </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>
                                                    -</div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>0</div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>
                                                    -</div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>
                                                    <span class="badge badge-danger">Absent</span>
                                                </div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>00:00</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width=2% align=left valign=top>
                                                <div align=center>8</div>
                                            </td>
                                            <td width=20% align=left valign=top><strong>Khushi Gupta</strong> </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>
                                                    -</div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>0</div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>
                                                    -</div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>
                                                    <span class="badge badge-danger">Absent</span>
                                                </div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>00:00</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width=2% align=left valign=top>
                                                <div align=center>9</div>
                                            </td>
                                            <td width=20% align=left valign=top><strong>MIS i2a</strong> </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>
                                                    -</div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>0</div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>
                                                    -</div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>
                                                    <span class="badge badge-danger">Absent</span>
                                                </div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>00:00</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width=2% align=left valign=top>
                                                <div align=center>10</div>
                                            </td>
                                            <td width=20% align=left valign=top><strong>Sachin Kumar</strong> </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>
                                                    -</div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>0</div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>
                                                    -</div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>
                                                    <span class="badge badge-danger">Absent</span>
                                                </div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>00:00</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width=2% align=left valign=top>
                                                <div align=center>11</div>
                                            </td>
                                            <td width=20% align=left valign=top><strong>Sunil S</strong> </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>
                                                    -</div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>0</div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>
                                                    -</div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>
                                                    <span class="badge badge-danger">Absent</span>
                                                </div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>00:00</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width=2% align=left valign=top>
                                                <div align=center>12</div>
                                            </td>
                                            <td width=20% align=left valign=top><strong>umesh singh</strong> </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>
                                                    -</div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>0</div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>
                                                    -</div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>
                                                    <span class="badge badge-danger">Absent</span>
                                                </div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>00:00</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width=2% align=left valign=top>
                                                <div align=center>13</div>
                                            </td>
                                            <td width=20% align=left valign=top><strong>vidur vs</strong> </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>
                                                    -</div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>0</div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>
                                                    -</div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>
                                                    <span class="badge badge-danger">Absent</span>
                                                </div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>00:00</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width=2% align=left valign=top>
                                                <div align=center>14</div>
                                            </td>
                                            <td width=20% align=left valign=top><strong>Vinay singh</strong> </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>
                                                    -</div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>0</div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>
                                                    -</div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>
                                                    <span class="badge badge-danger">Absent</span>
                                                </div>
                                            </td>
                                            <td width=12% align=left valign=top>
                                                <div align=center>00:00</div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

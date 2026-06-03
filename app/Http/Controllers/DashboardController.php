<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Proposal;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proposalmasuk = Proposal::select('id')->count();
        $proposaltolak = Proposal::where('status_final', 'Decline')
                        ->where(function($query) {
                            $query->where(function($query) {
                                      $query->whereNull('status_review')
                                            ->whereNull('status');
                                  })
                                  ->orWhere(function($query) {
                                      $query->where('status_review', 'Decline')
                                            ->whereNull('status');
                                  })
                                  ->orWhere(function($query) {
                                      $query->where('status_review', 'Decline')
                                            ->where('status', 'Decline');
                                  })
                                  ->orWhere(function($query) {
                                      $query->where('status_review', 'On Review')
                                            ->whereNull('status');
                                  })
                                  ->orWhere(function($query) {
                                      $query->whereNull('status')
                                            ->where('status_review', 'Decline')
                                            ->whereNull('status');
                                  });
                        })
                        ->count();

            $proposalreview = Proposal::where(function($query) {
            $query->where(function($query) {
                $query->whereNull('status_final')
                      ->orWhere('status_final', 'On Review');
            })
            ->where(function($query) {
                $query->whereNull('status_review')
                      ->whereNull('status')
                      ->orWhere(function($query) {
                          $query->where('status_review', 'Accepted')
                                ->where('status', 'Accepted');
                      })
                      ->orWhere(function($query) {
                          $query->where('status_review', 'On Review')
                                ->whereNull('status');
                      })
                      ->orWhere(function($query) {
                          $query->where('status_review', 'On Review')
                                ->where('status', 'On Review');
                      })
                      ->orWhere(function($query) {
                          $query->where('status_review', 'On Review')
                                ->where('status', 'Accepted');
                      })
                      ->orWhere(function($query) {
                          $query->where('status_review', 'Accepted')
                                ->where('status', 'On Review');
                      })
                      ->orWhere(function($query) {
                          $query->where('status_review', 'Decline')
                                ->whereNull('status');
                      });
            });
        })
        ->orWhere(function($query) {
            $query->where('status_review', 'On Review')
                  ->whereNull('status_final');
        })
        ->orWhere(function($query) {
            $query->where('status_review', 'Accepted')
                  ->whereNull('status_final');
        })
        ->orWhere(function($query) {
            $query->where('status', 'Decline')
                  ->whereNull('status_review')
                  ->whereNull('status_final');
        })
        ->count();



        $proposalterima = Proposal::where('status_final', 'Accepted')
                                ->where(function($query) {
                                    $query->where(function($query) {
                                              $query->whereNull('status_review')
                                                    ->whereNull('status');
                                          })
                                          ->orWhere(function($query) {
                                              $query->where('status_review', 'On Review')
                                                    ->whereNull('status');
                                          })
                                          ->orWhere(function($query) {
                                              $query->where('status_review', 'Accepted')
                                                    ->whereNull('status');
                                          })
                                          ->orWhere(function($query) {
                                              $query->where('status_review', 'Accepted')
                                                    ->where('status', 'On Review');
                                          })
                                          ->orWhere(function($query) {
                                              $query->where('status_review', 'Accepted')
                                                    ->where('status', 'Accepted');
                                          })
                                          ->orWhere(function($query) {
                                              $query->where('status_review', 'Decline')
                                                    ->whereNull('status');
                                          });
                                })
                                ->count();

        //user
        $proposalmasukuser = Proposal::select('id')->where('admin_id', Auth::user()->id)->count();
        $proposaltolakuser = Proposal::where('admin_id', Auth::user()->id)
                                ->where('status_final', 'Decline')
                                    ->where(function($query) {
                                        $query->where(function($query) {
                                                  $query->whereNull('status_review')
                                                        ->whereNull('status');
                                              })
                                              ->orWhere(function($query) {
                                                  $query->where('status_review', 'Decline')
                                                        ->whereNull('status');
                                              })
                                              ->orWhere(function($query) {
                                                  $query->where('status_review', 'Decline')
                                                        ->where('status', 'Decline');
                                              })
                                              ->orWhere(function($query) {
                                                  $query->where('status_review', 'On Review')
                                                        ->whereNull('status');
                                              })
                                              ->orWhere(function($query) {
                                                  $query->whereNull('status')
                                                        ->where('status_review', 'Decline')
                                                        ->whereNull('status');
                                              });
                                    })
                                    ->count();
                                
       $proposalreviewuser = Proposal::where('admin_id', Auth::user()->id)
                                        ->where(function ($query) {
                                            $query->where('status_final', 'On Review')
                                                ->where(function ($query) {
                                                    $query->whereNull('status_review')
                                                        ->whereNull('status')
                                                        ->orWhere(function ($query) {
                                                            $query->where('status_review', 'Accepted')
                                                                ->where('status', 'Accepted');
                                                        })
                                                        ->orWhere(function ($query) {
                                                            $query->where('status_review', 'On Review')
                                                                ->whereNull('status');
                                                        })
                                                        ->orWhere(function ($query) {
                                                            $query->where('status_review', 'On Review')
                                                                ->where('status', 'On Review');
                                                        })
                                                        ->orWhere(function ($query) {
                                                            $query->where('status_review', 'On Review')
                                                                ->where('status', 'Accepted');
                                                        })
                                                        ->orWhere(function ($query) {
                                                            $query->where('status_review', 'Accepted')
                                                                ->where('status', 'On Review');
                                                        })
                                                        ->orWhere(function ($query) {
                                                            $query->where('status_review', 'Decline')
                                                                ->whereNull('status');
                                                        });
                                                });
                                        })
                                        ->orWhere(function ($query) {
                                            $query->where('admin_id', Auth::user()->id)
                                            ->where('status_review', 'On Review')
                                                ->whereNull('status_final');
                                        })
                                        ->orWhere(function ($query) {
                                            $query->where('admin_id', Auth::user()->id)
                                            ->where('status_review', 'Accepted')
                                                ->whereNull('status_final');
                                        })
                                        ->count();

        $proposalterimauser = Proposal::where('admin_id', Auth::user()->id)
                                        ->where('status_final', 'Accepted')
                                            ->where(function($query) {
                                                $query->where(function($query) {
                                                          $query->whereNull('status_review')
                                                                ->whereNull('status');
                                                      })
                                                      ->orWhere(function($query) {
                                                          $query->where('status_review', 'On Review')
                                                                ->whereNull('status');
                                                      })
                                                      ->orWhere(function($query) {
                                                          $query->where('status_review', 'Accepted')
                                                                ->whereNull('status');
                                                      })
                                                      ->orWhere(function($query) {
                                                          $query->where('status_review', 'Accepted')
                                                                ->where('status', 'On Review');
                                                      })
                                                      ->orWhere(function($query) {
                                                          $query->where('status_review', 'Accepted')
                                                                ->where('status', 'Accepted');
                                                      })
                                                      ->orWhere(function($query) {
                                                          $query->where('status_review', 'Decline')
                                                                ->whereNull('status');
                                                      });
                                            })
                                            ->count();
        
        $visitorCounts = [];
        for ($month = 1; $month <= 12; $month++) {
            $visitorCounts[] = Visitor::whereYear('visited_at', 2024)
                ->whereMonth('visited_at', $month)
                ->count();
        }
        
        $proposalCounts = Proposal::selectRaw('YEAR(tanggal) as year, COUNT(*) as count')
            ->whereYear('tanggal', '>=', 2021)
            ->whereYear('tanggal', '<=', 2030)
            ->groupBy('year')
            ->orderBy('year')
            ->pluck('count', 'year')
            ->toArray();
        
        
        $startYear = 2021;
        $endYear = 2030;
        $counts = [];
        for ($year = $startYear; $year <= $endYear; $year++) {
            $counts[$year] = $proposalCounts[$year] ?? 0;
        }
        
        $proposalCounts = Proposal::select('progdi', \DB::raw('count(*) as total'))
        ->groupBy('progdi')
        ->orderBy('total', 'desc')
        ->get();
        
        $adminProposalCounts = Proposal::select('admin_id', \DB::raw('count(*) as total'))
        ->groupBy('admin_id')
        ->orderBy('total', 'desc')
        ->limit(3)
        ->get();
        
        return view('dashboard.app', compact('adminProposalCounts', 'proposalCounts', 'counts', 'visitorCounts', 'proposalmasuk', 'proposaltolak', 'proposalreview', 'proposalterima', 'proposalmasukuser', 'proposaltolakuser', 'proposalreviewuser', 'proposalterimauser'));
    }
}

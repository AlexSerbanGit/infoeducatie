package com.example.beescanner;

import android.annotation.TargetApi;
import android.content.Intent;
import android.net.Uri;
import android.os.Build;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.webkit.PermissionRequest;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.content.DialogInterface;
import android.graphics.Bitmap;
import android.webkit.WebChromeClient;

public class MainActivity extends AppCompatActivity {

    private WebView mywebview;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        mywebview = (WebView) findViewById(R.id.webview);
        WebSettings webSettings = mywebview.getSettings();
        webSettings.setJavaScriptEnabled(true);
        webSettings.setAllowFileAccessFromFileURLs(true);
        webSettings.setAllowUniversalAccessFromFileURLs(true);
        webSettings.setJavaScriptCanOpenWindowsAutomatically(true);
        webSettings.setJavaScriptEnabled(true);
        webSettings.setDomStorageEnabled(true);
        webSettings.setJavaScriptCanOpenWindowsAutomatically(true);
//        webSettings.setBuiltInZoomControls(true);
        webSettings.setAllowFileAccess(true);
        webSettings.setSupportZoom(true);
        mywebview.loadUrl("https://scanner.d-soft.ro");
        mywebview.setWebViewClient(new myWebClient());
        mywebview.setWebChromeClient(new WebChromeClient() {
            @Override
            public void onPermissionRequest(final PermissionRequest request) {

                MainActivity.this.runOnUiThread(new Runnable(){
                    @TargetApi(Build.VERSION_CODES.LOLLIPOP)
                    @Override
                    public void run() {
                        request.grant(request.getResources());
                    }// run
                });// MainActivity

            }// onPermissionRequest
        });// setWebChromeClient


        }


    public class myWebClient extends WebViewClient {
        @Override
        public void onPageStarted(WebView view, String url, Bitmap favicon) {
            super.onPageStarted(view, url, favicon);
        }

//        public boolean shouldOverrideUrlLoading(WebView view, String url){
////            setContentView(R.layout.activity_main);
////            view = (WebView) findViewById(R.id.webview);
////            WebSettings webSettings = mywebview.getSettings();
////            view.setWebViewClient(new WebViewClient());
////            view.loadUrl("111");
////            webSettings.setJavaScriptEnabled(true);
////            return true;
//
//        }
        @Override
        public boolean shouldOverrideUrlLoading(WebView view, String url)
        {
            view.loadUrl(url);
            return true;
        }

    }

        @Override
            public void onBackPressed () {
                if(mywebview.canGoBack()) {
                    mywebview.goBack();
                }else{
                    onBackPressed();
                }
        }
}

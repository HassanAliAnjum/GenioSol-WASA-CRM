package com.geniosol.wasacrm.webservice;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.util.ArrayList;
import java.util.List;

import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;

import android.util.Log;

public class Request {

	public static int login (String name, String pwd)
	{
		String responseStr = "";
		
		try
		{
			DefaultHttpClient httpClient = new DefaultHttpClient();
			HttpPost httpPost = new HttpPost("http://192.168.30.68/web/server/index.php");
			
			List<NameValuePair> nameValuesPair = new ArrayList<NameValuePair>(3);
			nameValuesPair.add(new BasicNameValuePair("action","login"));
			nameValuesPair.add(new BasicNameValuePair("user_name",name));
			nameValuesPair.add(new BasicNameValuePair("password",pwd));
			httpPost.setEntity(new UrlEncodedFormEntity(nameValuesPair));
			
			HttpResponse httpResponse = httpClient.execute(httpPost);
			
			BufferedReader in = new BufferedReader (new InputStreamReader(httpResponse.getEntity().getContent()));
			responseStr = in.readLine();
			in.close();
		}
		catch(ClientProtocolException e)
		{
			Log.e("Exception", "Client Protocol Exception");
		}
		catch(IOException e)
		{
			Log.e("Exception", "IOException");
		}
		
		return Integer.parseInt(responseStr);
	}
}

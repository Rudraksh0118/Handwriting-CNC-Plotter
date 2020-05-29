# coding=utf-8
from __future__ import absolute_import
from __future__ import division
from __future__ import print_function
import flask
import os
import sys
import re
import requests
import string
import subprocess
from shutil import copyfile
from werkzeug.utils import secure_filename
from pytube import YouTube 
from flask import Flask, render_template, request, redirect, flash, abort, jsonify


import json
from ibm_watson import SpeechToTextV1
from ibm_cloud_sdk_core.authenticators import IAMAuthenticator



app = flask.Flask(__name__)
app.config['DEBUG'] = 'True'

@app.route('/uploader', methods=['GET'])
def file_upload():
    return render_template(template.html)

@app.route('/stotxt', methods=['GET'])
def home():
    return  '''<h1>API for handwriting bot <h1>'''
    authenticator = IAMAuthenticator('602DUqWjqGvwgHZJQI_9ryUH7ecB8uh28jDWOaAb4xHo')
    speech_to_text = SpeechToTextV1 (authenticator=authenticator)

    speech_to_text.set_service_url('https://api.eu-gb.speech-to-text.watson.cloud.ibm.com/instances/24e020f9-0778-42cf-8d2d-e38b4c982ce9')

    with open('/home/rudr0118/Desktop/deepspeech/audio2.wav', 'rb') as audio_file:
        speech_recognition_results = speech_to_text.recognize(audio=audio_file, content_type='audio/wav', word_alternatives_threshold=0.9).get_result()

#speech_model = speech_to_text.get_model('en-US_BroadbandModel').get_result()


    str1=json.dumps(speech_recognition_results)
    distros_dict = json.loads(str1)

    dict1=distros_dict['results']

    print(dict1[0]['alternatives'][0]['transcript'])


    


app.run(host='0.0.0.0')
# -*- coding: utf-8 -*-
"""
Éditeur de Spyder

Ceci est un script temporaire.
"""

from flask import Flask, render_template
app = Flask(__name__)

@app.route('/')
def index():
   return render_template('index.php')


if __name__ == '__main__':
   app.run(debug=True)


from typing import Union

import os
from dotenv import load_dotenv

from llama_index import OpenAIEmbedding, VectorStoreIndex, SimpleDirectoryReader, PromptHelper, ServiceContext, StorageContext, load_index_from_storage, download_loader
from llama_index.llms import OpenAI
from llama_index.text_splitter import SentenceSplitter
from fastapi import FastAPI
from fastapi.middleware.cors import CORSMiddleware

app = FastAPI()

origins = ["*"]

app.add_middleware(
    CORSMiddleware,
    allow_origins=origins,
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

load_dotenv()

@app.get("/chat")
async def chat(q: Union[str, None] = None):
    return Chavsu(q)


# Function for executing the prediction
def Chavsu(q):

    # Check if we have the persistent index installed
    # If true, create the index from scratch, else use existing index
    # if not os.path.exists(os.getenv('PERSIST_DIR')):
    #     # load the documents and create the index
    #     documents =  SimpleDirectoryReader(os.getenv('DATA_SOURCE')).load_data()
        
    #     llm = OpenAI(model="gpt-3.5-turbo", temperature=0.3)
    #     splitter = SentenceSplitter(chunk_size=256, chunk_overlap=20)
    #     embed_model= OpenAIEmbedding()

    #     gpt_35_context = ServiceContext.from_defaults(
    #         llm=llm,
    #         text_splitter=splitter,
    #         embed_model=embed_model
    #     )
    #     index = VectorStoreIndex.from_documents(documents, service_context=gpt_35_context)

    #     # store it for later
    #     index.storage_context.persist(persist_dir=os.getenv('PERSIST_DIR'))
    # else:
    #     # load the existing index
    #     storage_context = StorageContext.from_defaults(persist_dir=os.getenv('PERSIST_DIR'))
    #     index = load_index_from_storage(storage_context)

     # load the documents and create the index
    
    DatabaseReader = download_loader('DatabaseReader')

    reader = DatabaseReader(
        uri = os.getenv('DATA_SOURCE_URI')
    )
    query = f"""
        SELECT response FROM keywords_response
    """
    documents = reader.load_data(query=query)
    
    llm = OpenAI(model="gpt-3.5-turbo", temperature=0.3)
    splitter = SentenceSplitter(chunk_size=256, chunk_overlap=20)
    embed_model= OpenAIEmbedding()

    gpt_35_context = ServiceContext.from_defaults(
        llm=llm,
        text_splitter=splitter,
        embed_model=embed_model
    )
    index = VectorStoreIndex.from_documents(documents, service_context=gpt_35_context)

    query_engine = index.as_chat_engine(chat_mode='context')
    response = query_engine.chat(q)
    return response.response

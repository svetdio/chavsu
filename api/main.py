# from typing import Union
import os
from llama_index import OpenAIEmbedding, VectorStoreIndex, SimpleDirectoryReader, PromptHelper, ServiceContext, StorageContext, load_index_from_storage
from llama_index.llms import OpenAI
from llama_index.text_splitter import SentenceSplitter
# from fastapi import FastAPI

# app = FastAPI()

os.environ['OPENAI_API_KEY'] = "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"

# @app.get("/")
# async def read_root():
#     return Chavsu()


# Function for executing the prediction
# def Chavsu():
#     documents = SimpleDirectoryReader('src').load_data()
#     gpt_35_context = ServiceContext.from_defaults(
#         llm=OpenAI(model="gpt-3.5-turbo", temperature=0.3)
#     )

#     index = VectorStoreIndex.from_documents(documents, service_context=gpt_35_context,)
#     query_engine = index.as_query_engine()
#     response = query_engine.query("What do you think of Facebook's LLaMa?")
#     return response.print_response_stream()

question = input("Enter your question: ")

PERSIST_DIR = "./storage"
if not os.path.exists(PERSIST_DIR):
    # load the documents and create the index
    documents =  SimpleDirectoryReader("C:\\xampp8\\htdocs\\chavsu\\api\\src").load_data()
    
    llm = OpenAI(model="gpt-3.5-turbo", temperature=0.3)
    splitter = SentenceSplitter(chunk_size=256, chunk_overlap=20)
    embed_model= OpenAIEmbedding()

    gpt_35_context = ServiceContext.from_defaults(
        llm=llm,
        text_splitter=splitter,
        embed_model=embed_model
    )
    index = VectorStoreIndex.from_documents(documents, service_context=gpt_35_context)

    # store it for later
    index.storage_context.persist(persist_dir=PERSIST_DIR)
else:
    # load the existing index
    storage_context = StorageContext.from_defaults(persist_dir=PERSIST_DIR)
    index = load_index_from_storage(storage_context)

query_engine = index.as_chat_engine(chat_mode='context')
response = query_engine.chat(question)
print(response)